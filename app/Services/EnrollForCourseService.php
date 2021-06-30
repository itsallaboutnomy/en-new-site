<?php


namespace App\Services;


use App\Exceptions\InvalidExamEnrollmentException;
use App\Mail\PaymentRequestMail;

use App\Models\Quiz\Course;
use App\Models\Quiz\QuizCertificationEnrollment;
use App\Models\Quiz\QuizCertificationPayment;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use \NumberFormatter;


class EnrollForCourseService
{
    public function enroll(Course $course)
    {
        DB::beginTransaction();
        $existingEnrollment = QuizCertificationEnrollment::where([
            'course_id' => $course->id,
            'student_user_id' => 1
//            'student_user_id' => auth()->user()->id
        ])
         ->first();
        $token =substr(md5(mt_rand()), 0, 50);
        $unique_code = $this->getUniqueCode($course);
        $user = auth()->user();
        if(empty($existingEnrollment)) {
            $payment_status = $this->getPaymentStatusForFirstEnrollment();
            $newEnrollment = QuizCertificationEnrollment::create([
//                'student_user_id' => $user->id,
                'student_user_id' => 1,
                'unique_code' => $unique_code,
                'course_id' => $course->id,
                'secret_token' => $token,
                'token_expired_at' => Carbon::now()->addDay(1),
                'payment_status' => $payment_status
            ]);
            if($payment_status === QuizCertificationEnrollment::PAYMENT_STATUS_PENDING) {
                $enrollmentChallanUrl = $this->getPathTrainingChallanPDF($user,$course,$newEnrollment);
                $newEnrollment->challan_url = $enrollmentChallanUrl;
                $newEnrollment->save();
                Mail::to($user->email)->send(new PaymentRequestMail($course, $user, $newEnrollment));
                DB::commit();
                return [
                    'enrollment_id' => $newEnrollment->id,
                    'message' => 'You are enrolled. Kindly submit your fee to proceed with the exam.',
                    'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING
                ];
            }
            DB::commit();
            return [
                'message' => 'You are ready to take the Exam.',
                'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_ENROLLED
            ];
        }
        if($this->isAlreadyCertified($course->id)) {
            DB::commit();
            return [
                'message' => 'You are already certified.',
                'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_ALREADY_CERTIFIED
            ];
        }

        if(!empty($existingEnrollment->attempted_at)) {
            $time_till_next_attemp = Carbon::parse($existingEnrollment->attempted_at)->addMonth(3);
            if(Carbon::now()->gt($time_till_next_attemp)) {

                $newEnrollment = QuizCertificationEnrollment::create([
                    'student_user_id' => $user->id,
                    'unique_code' => $unique_code,
                    'course_id' => $course->id,
                    'secret_token' => $token,
                    'token_expired_at' => Carbon::now()->addDay(1),
                    'payment_status' => 'pending'
                ]);
                Mail::to($user->email)->send(new PaymentRequestMail($course, $user, $newEnrollment));
                DB::commit();
                return [
                    'message' => 'You are enrolled. Kindly submit your fee to proceed with the exam.',
                    'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING
                ];
            }
            DB::commit();
            return [
                'message' => 'Wait for the given time until your next attempt',
                'next_attempt_at' => $time_till_next_attemp,
                'status' =>  QuizCertificationEnrollment::ENROLLMENT_STATUS_WAIT
            ];
        }

        if($existingEnrollment->payment_status == QuizCertificationEnrollment::PAYMENT_STATUS_PENDING) {
            DB::commit();
            return [
                'message' => 'Payment Pending',
                'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING
            ];
        }
        if($existingEnrollment->payment_status == QuizCertificationEnrollment::PAYMENT_STATUS_PENDING_APPROVAL) {
            DB::commit();
            return [
                'message' => 'Your Payment is being verified. please check back after some time to take exam.',
                'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING_APPROVAL
            ];
        }
        if($existingEnrollment->payment_status == QuizCertificationEnrollment::PAYMENT_STATUS_FREE || $existingEnrollment->payment_status == QuizCertificationEnrollment::PAYMENT_STATUS_APPROVED) {
            DB::commit();
            return [
                'message' => 'You are ready to take the Exam.',
                'status' => QuizCertificationEnrollment::ENROLLMENT_STATUS_ENROLLED
            ];
        }
        throw new InvalidExamEnrollmentException(400, 'Bad Request.');

    }
    private function isAlreadyCertified(int $course_id)
    {
        $certificate = DB::table('courses as c')
//            ->join('quizzes as q', 'q.course_id', '=', 'c.id')
            ->join('quiz_results as qr', 'qr.course_id', '=', 'c.id')
            ->where('c.id', '=', $course_id)
            ->where('qr.is_passed',  '=', 1)
            ->first();
        if(!empty($certificate)) {
            return true;
        }
        return false;
    }

    private function getPaymentStatusForFirstEnrollment()
    {
        $user_id = auth()->user()->id;
        $user_id = 1;
        $trainingEnrollmentPaid = DB::table('enrollments')
            ->where('user_id', $user_id)
            ->where('payment_status', 'paid')
            ->first();
        if($trainingEnrollmentPaid) {
            return 'approved';
        }
        return 'pending';
    }

    private function getUniqueCode(Course $course)
    {
        if(empty($course->key)) {
            throw new \Exception('course key not found', 400 );
        }
        $rslt = DB::table('quiz_certification_enrollments')
        ->selectRaw('SUBSTRING(unique_code, -4, 4) as series')
            ->where('unique_code', 'like', $course->key . '%')
            ->orderBy('series', 'desc')
            ->first();

        $course_enrollment_count = intval($rslt->series ?? 0) + 1;

        $unique_code = $course->key.'-'.date('m').'-'.date('y').'-'.str_pad($course_enrollment_count, 4, '0', STR_PAD_LEFT);
        return $unique_code;
    }

    public function paymentProof($request,$quizEnrollmentId){

        $quizCertificationEnrollment = QuizCertificationEnrollment::find($quizEnrollmentId);
        if(!$quizCertificationEnrollment){
            return [
                'message' => 'Enrollment not found!.',
            ];
        }

        $paymentReceiptImage = $request->file('payment_receipt')->store('public/uploads');
        $paymentReceiptPath = str_replace('public/' ,'storage/',$paymentReceiptImage);

        $cnicFrontImage = $request->file('cnic_front')->store('public/uploads');
        $cnicFrontPath = str_replace('public/' ,'storage/',$cnicFrontImage);

        $cnicBackImage = $request->file('cnic_back')->store('public/uploads');
        $cnicBackImagePath = str_replace('public/' ,'storage/',$cnicBackImage);

        $user = auth()->user();
        $quizCertificationPayment = QuizCertificationPayment::create([
            'quiz_enrollment_id' => $quizCertificationEnrollment->id,
            'payment_channel_id' => '1',
            'payment' => $request->payment,
            'payment_currency' => 'PKR',
            'payment_date' => $request->payment_date,
            'payment_receipt_path' => $paymentReceiptPath,
            'cnic_front' => $cnicFrontPath,
            'cnic_back' => $cnicBackImagePath,
        ]);

        $quizCertificationEnrollment->update([
           'payment_status' => QuizCertificationEnrollment::PAYMENT_STATUS_PENDING_APPROVAL
        ]);
        return [
            'message' => 'You are ready to take the Exam.',
        ];

    }

    private function getPathTrainingChallanPDF($student,$course,$enrollment): string
    {
        $paymentAccount = DB::table('payment_channels')->where('account_title', 'The Enablers')->first();

        $numberFormatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $trainingFeeInWords = $numberFormatter->format($course->price_pkr);

//        $serialNumber = time().'TR'.$this->payment->wherePaymentFor(Payment::$paymentFor['training'])->count();
        $serialNumber = time().'TR';
        view()->share('payment.challan-pdf', compact('student','course','serialNumber','trainingFeeInWords','paymentAccount','enrollment'));
        $pdf = PDF::loadView('payment.challan-pdf', compact('student','course','serialNumber','trainingFeeInWords','paymentAccount','enrollment'));
        $pdf->setPaper('A4', 'landscape');

        $fileName = str_replace(' ','-',ucwords(trim($student->name))).'-Enrollment-Challan-'.$enrollment->unique_code.'.pdf';
        $filePath = 'public/payment-challans-pdf/'.$fileName;

        Storage::put($filePath, $pdf->output());

        return str_replace('public/','storage/',$filePath);
    }
}
