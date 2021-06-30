<?php

namespace App\Http\Controllers\Enablers;

use App\Models\User;
use App\Mail\BookOrderMail;
use App\Models\Enablers\Event;
use App\Models\Enablers\Trainer;
use App\Mail\EVSUserEnrolledMail;
use App\Models\Enablers\Training;
use App\Models\Enablers\Enrollment;
use App\Models\Enablers\PaymentProof;
use App\Mail\SeminarUserEnrolledMail;
use App\Mail\TrainingUserEnrolledMail;
use App\Models\Enablers\PaymentAccount;
use App\Http\Requests\Enablers\EnrollmentRequest;
use App\Http\Requests\Enablers\PaymentProofRequest;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentsController extends Controller
{
    protected $user, $event, $trainer, $training, $enrollment, $paymentProof, $viewPrefix, $routePrefix;

    public function __construct(
        Event $event,
        User $student,
        Trainer $trainer,
        Training $training,
        Enrollment $enrollment,
        PaymentProof $paymentProof,
    ){
        $this->event = $event;
        $this->user = $student;
        $this->trainer = $trainer;
        $this->training = $training;
        $this->enrollment = $enrollment;
        $this->paymentProof = $paymentProof;

        $this->routePrefix = 'app.enrollment.';
        $this->viewPrefix = 'enablers.app.enrollments.';
    }

    public function create(Request $request)
    {
        $data = new \stdClass();
        $data->enrollment_value = null;

        $data->slug = $request->slug;
        $data->enroll_for = $request->enroll_for;
        $data->is_free = $request->is_free;
        $data->enrollment_type_name = isset(Enrollment::$enrollForName[$data->enroll_for]) ? Enrollment::$enrollForName[$data->enroll_for] : null;

        if(!$data->slug || !in_array($data->enroll_for,Enrollment::$enrollFor) ){
            abort(404);
        }

        if($data->enroll_for === 'training')
        {
            $training = $this->training->whereSlug($data->slug)->enabled()->first();
            if(!$training){
                abort(404);
            }
            $data->enrollment_value = $training->title;

            if($data->slug == 'enabling-video-series' and !in_array($data->is_free,[1,0])) {
                $data = null;
            }
        }
        elseif($data->enroll_for === 'trainer')
        {
            $trainer = $this->trainer->whereSlug($data->slug)->enabled()->first();
            if(!$trainer){
                abort(404);
            }
            $data->enrollment_value = $trainer->name;

            if(in_array($request->mentorship,['full','hourly']))
            {
                $data->mentorship = $request->mentorship;
                if($trainer->is_mentorship_enabled == 0 && $request->mentorship == 'full')
                    $data = null;
                elseif($trainer->is_per_hour_enabled == 0 && $request->mentorship == 'hourly')
                    $data = null;
            } else {
                $data = null;
            }
        }
        elseif($data->enroll_for === 'seminar')
        {
            $seminar = $this->event->whereType(Event::$type['seminar'])->whereSlug($data->slug)->enabled()->first();
            if(!$seminar){
                abort(404);
            }

            if(!$seminar->starting_at) {
                return redirect()->back()->with('error','Not need to enrolled seminar date is not announced yet!');
            }

            $data->enrollment_value = $seminar->title;
        }
        elseif($data->enroll_for === 'book') {
            $data->enrollment_value = 'Book';
        }
        else {
            abort(404);
        }

        return view($this->viewPrefix.'create',compact('data'));
    }

    public function store(EnrollmentRequest $request)
    {
        $data = $request->all();

        $temp = explode(':',$request->enroll_for);
        $slug = $temp[1];
        $enrollFor = $temp[0];

        $user = $this->user->whereCnic($request->cnic)->first();

        $enrollmentData = [
            'enroll_for' => $enrollFor,
            'heard_from' => $request->heard_from,
            'payment_type' => isset($request->payment_type) ? $request->payment_type : 'cash',
            'transaction_type' => $request->payment_type == 'online' ? $request->transaction_type : null,
        ];

        $trainer = null;
        $seminar = null;
        $training = null;
        $uniqueCode = null;
        $enrollmentFor = null;
        $paymentSpecificFor = null;
        $enrollmentChallanUrl = null;

        if($enrollFor === 'training' || $enrollFor === 'trainer')
        {
            if($enrollFor === 'trainer') {
                $trainer = $this->trainer->whereSlug($slug)->enabled()->first();
                $training = $this->training->where('key','O2O')->enabled()->first();
            } else {
                $training = $this->training->whereSlug($slug)->enabled()->first();
            }

            if(!$user){
                $data['type'] = User::$userType['trainingVisitor'];
                if($training->key == 'EVS'){
                    $data['type'] = User::$userType['evsVisitor'];
                }

                $user = $this->user->create($data);

                $user->assignRole(['Student']);
            }
            elseif($user && $enrollFor === 'training' && $training->key == 'EVS' && $request->payment_type == 'free') {
                return redirect()->back()->withInput()->with('error','You have been already enrolled for this training');
            }

            if($enrollFor === 'training' && $training->key == 'EVS' && $request->payment_type == 'free')
            {
                $user->type = User::$userType['evsVisitor'];
                $user->facebook_profile_link = $request->facebook_profile_link;
                $user->cnic_front_image_path = $this->uploadedImagePath($request,'cnic_front_image',User::$imagesDirectoryPath);
                $user->cnic_back_image_path = $this->uploadedImagePath($request,'cnic_back_image',User::$imagesDirectoryPath);
                $user->utility_bill_image_path = $this->uploadedImagePath($request,'utility_bill_image',User::$imagesDirectoryPath);
                $user->income_proof_image_path = $this->uploadedImagePath($request,'income_proof_image',User::$imagesDirectoryPath);
                $user->save();

                $enrollmentFor = $training->key;

                Mail::to($user->email)->send(new EVSUserEnrolledMail($user->name));

                return view($this->viewPrefix.'enrollment-success',compact('uniqueCode','enrollmentFor','enrollmentChallanUrl'));
            }

            $trainingBatch = $training->batches()->latest()->first();

            $paymentSpecificFor = $training->key;
            $enrollmentFor = $training->title;

            $isAlreadyEnrolled = $this->enrollment->whereUserId($user->id)->whereTrainingId($training->id)->whereTrainingBatchId($trainingBatch->id)->first();
            if($isAlreadyEnrolled){
                return redirect()->back()->withInput()->with('error','You have been already enrolled for this training');
            }

            $uniqueCode = $this->getUniqueCode($enrollFor,$training);

            $enrollmentData['user_id'] = $user->id;
            $enrollmentData['unique_code'] = $uniqueCode;
            $enrollmentData['training_id'] = $training->id;
            $enrollmentData['training_batch_id'] = $trainingBatch->id;
            $enrollmentData['payable_price'] = $training->charging_fee;

            if($training->currency == 'USD'){
                $enrollmentData['payable_price'] = $enrollmentData['payable_price'] * env('USD_DOLLAR_INTO_PKR');
            }

            if($enrollFor === 'trainer')
            {
                $enrollmentData['trainer_id'] = $trainer->id;

                $enrollmentData['actual_price'] = $trainer->mentorship_fee;
                $enrollmentData['usd_price'] = env('USD_DOLLAR_INTO_PKR');

                $enrollmentData['payable_price'] = $trainer->mentorship_fee;
                if($trainer->mentorship_fee_currency == 'USD'){
                    $enrollmentData['payable_price'] = $enrollmentData['payable_price'] * env('USD_DOLLAR_INTO_PKR');
                }

                if($request->hired_for_hours){
                    $enrollmentData['counts'] = $request->hired_for_hours;
                    $enrollmentData['actual_price'] = $trainer->per_hour_fee;
                    $enrollmentData['payable_price'] = $request->hired_for_hours * $trainer->per_hour_fee;
                    if($trainer->per_hour_fee_currency == 'USD'){
                        $enrollmentData['payable_price'] = $enrollmentData['payable_price'] * env('USD_DOLLAR_INTO_PKR');
                    }
                }
            }
        }
        elseif($enrollFor === 'seminar')
        {
            if(!$user){
                $data['type'] = User::$userType['seminarVisitor'];
                $user = $this->user->create($data);

                $user->assignRole(['Student']);
            }

            $seminar = $this->event->whereType(Event::$type['seminar'])->whereSlug($slug)->enabled()->first();
            $seminarDate = ($seminar->starting_at ? date('d-M-Y',strtotime($seminar->starting_at)) : 'TBC');
            $enrollmentFor = $seminarDate. '  ' .$seminar->title;

            $isAlreadyEnrolled = $this->enrollment->whereUserId($user->id)->whereEventId($seminar->id)->first();
            if($isAlreadyEnrolled){
                return redirect()->back()->withInput()->with('error','You have been already enrolled for this seminar');
            }

            $uniqueCode = $this->getUniqueCode($enrollFor,$seminar);


            $enrollmentData['user_id'] = $user->id;
            $enrollmentData['unique_code'] = $uniqueCode;
            $enrollmentData['event_id'] = $seminar->id;
            $enrollmentData['counts'] = $request->number_of_seats;
            $enrollmentData['payable_price'] = $seminar->charging_fee * $request->number_of_seats;
        }
        elseif($enrollFor === 'book')
        {
            if(!$user){
                $data['type'] = User::$userType['bookVisitor'];
                $user = $this->user->create($data);

                $user->assignRole(['Student']);
            }

            $enrollmentFor = 'book';
            $uniqueCode = $this->getUniqueCode($enrollFor,'book');

            $enrollmentData['user_id'] = $user->id;
            $enrollmentData['unique_code'] = $uniqueCode;
            $enrollmentData['payable_price'] = $request->transaction_type == 'international' ?  35 * env('USD_DOLLAR_INTO_PKR'): '3500';

        }

        $paymentAccount = PaymentAccount::getPaymentAccount($enrollFor,$enrollmentData['payment_type'],$enrollmentData['transaction_type'],$paymentSpecificFor);
        $enrollmentData['payment_account_id'] = $paymentAccount->id;

        $enrollment = $this->enrollment->create($enrollmentData);

        if($enrollFor === 'training' || $enrollFor === 'trainer')
        {
            if($enrollment->payment_type == 'cash') {
                $enrollmentChallanUrl = $this->getPathTrainingChallanPDF($user,$enrollment,$training,$paymentAccount);
                $enrollment->challan_url = $enrollmentChallanUrl;
                $enrollment->save();

                $enrollmentChallanUrl = _asset($enrollmentChallanUrl);
            }

            Mail::to($user->email)->send(new TrainingUserEnrolledMail($uniqueCode,$enrollmentFor,$enrollmentData['payable_price'],$user->name,$paymentAccount,$enrollmentChallanUrl));
        }
        elseif($enrollFor === 'seminar') {
            Mail::to($user->email)->send(new SeminarUserEnrolledMail($uniqueCode,$enrollmentFor,$user,$request->number_of_seats,$paymentAccount));
        }
        elseif($enrollFor === 'book') {
            Mail::to($user->email)->send(new BookOrderMail($uniqueCode,$enrollmentFor,$user,$paymentAccount,$enrollmentData['payable_price']));
        }

        return view($this->viewPrefix.'enrollment-success',compact('uniqueCode','enrollmentFor','enrollmentChallanUrl'));
    }

    private function getUniqueCode($enrollFor,$object): string
    {
        $key = '';
        $latestEnrollmentId = 1;

        if ($enrollFor === 'training' || $enrollFor === 'trainer') {
            $temp = $this->enrollment->whereTrainingId($object->id)->latest();
            $latestEnrollmentId += ($temp->count() >= 1 ? $temp->latest()->first()->id : 0);
            $key = $object->key;
        }
        elseif ($enrollFor === 'seminar') {
            $temp = $this->enrollment->whereEventId($object->id)->latest();
            $latestEnrollmentId += ($temp->count() >= 1 ? $temp->first()->id : 0);
            $key = $object->key;
        }
        elseif ($enrollFor === 'book') {
            $bookEnrollCount = $this->enrollment->where('enroll_for',$object)->count();
            $latestEnrollmentId = $bookEnrollCount+1;
            $key = 'EBOK';
        }

        return $key.'-'.date('m').'-'.date('y').'-'.str_pad($latestEnrollmentId, 5, '0', STR_PAD_LEFT);
    }

    private function getPathTrainingChallanPDF($student,$enrollment,$training,$paymentAccount): string
    {
        $numberFormatter = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        $trainingFeeInWords = $numberFormatter->format($enrollment->payable_price);

        $serialNumber = time().($this->enrollment->whereEnrollFor('training')->count() + 1);

        view()->share($this->viewPrefix.'challan-pdf', compact('student','training','serialNumber','trainingFeeInWords','paymentAccount','enrollment'));
        $pdf = PDF::loadView($this->viewPrefix.'challan-pdf', compact('student','training','serialNumber','trainingFeeInWords','paymentAccount','enrollment'));
        $pdf->setPaper('A4', 'landscape');

        $fileName = time().'-'.str_replace(' ','-',ucwords(trim($student->name))).'-Enrollment-Challan-'.$enrollment->unique_code.'.pdf';
        $filePath = Enrollment::$pdfChallanDirectoryPath.$fileName;

        Storage::put($filePath, $pdf->output());

        return str_replace('public/','storage/',$filePath);
    }

    public function alreadyEnrolled(){
        return view($this->viewPrefix.'already-enrolled');
    }

    public function confirmEnrollment(Request $request)
    {
        $request->validate([
            'registration_number' => 'required'
        ]);

        $enrollment = $this->enrollment
                           ->with('user','event','trainer','training','trainingBatch','paymentAccount')
                           ->whereUniqueCode(strtoupper(trim($request->registration_number)))
                           ->first();

        if(!$enrollment){
            return redirect()->back()->withInput()->with('error',"Registration Code doesn't exist in our database.");
        }

        return redirect()->route($this->routePrefix.'addPaymentProof',$enrollment->id);
    }

    public function addPaymentProof($id)
    {
        $enrollment = $this->enrollment->with('user','event','training','trainer','trainingBatch')->find($id);

        if(!$enrollment){
            abort('404');
        }

        return view($this->viewPrefix.'payment-proof',compact('enrollment'));
    }

    public function storePaymentProof(PaymentProofRequest $request,$id)
    {
        $enrollment = $this->enrollment->find($id);

        if(!$enrollment){
            abort('404');
        }

        $enrollment->is_paid = true;
        $enrollment->save();

        if($enrollment->enroll_for === 'training'){
            $enrollment->mode = $request->training_mode;
            $enrollment->training_city_id = $request->training_city_id;
            $enrollment->save();
        }

        $basePath = PaymentProof::$imagesDirectoryPath;

        $paymentReceiptPath = $request->file('payment_receipt')->store($basePath.'payment-receipt-images/');
        $cnicFrontImagePath = $request->file('cnic_front_image')->store($basePath.'cnic-front-images/');
        $cnicBackImagePath = $request->file('cnic_back_image')->store($basePath.'cnin-back-images/');

        $this->paymentProof->create([
            'enrollment_id' => $enrollment->id,
            'paid_price' => $request->transaction_amount,
            'payment_date' => date('Y-m-d',strtotime($request->transaction_date)),

            'payment_receipt_path' => $paymentReceiptPath,
            'cnic_front_image_path' => $cnicFrontImagePath,
            'cnic_back_image_path' => $cnicBackImagePath
        ]);

        return redirect()->route($this->routePrefix.'submittedPaymentProof');
    }

    public function submittedPaymentProof() {
        return view($this->viewPrefix.'payment-proof-success');
    }
}
