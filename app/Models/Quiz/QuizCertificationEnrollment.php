<?php

namespace App\Models\Quiz;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class QuizCertificationEnrollment extends Model
{
    const PAYMENT_STATUS_FREE = 'free';
    const PAYMENT_STATUS_PAID = 'paid';
    const PAYMENT_STATUS_APPROVED = 'approved';
    const PAYMENT_STATUS_PENDING_APPROVAL = 'pending approval';
    const PAYMENT_STATUS_PENDING = 'pending';
    const PAYMENT_STATUS_REJECTED = 'rejected';
    const ENROLLMENT_STATUS_ALREADY_CERTIFIED = 'already certified';
    const ENROLLMENT_STATUS_ENROLLED = 'enrolled';
    const ENROLLMENT_STATUS_PENDING = 'payment proof pending';
    const ENROLLMENT_STATUS_PENDING_APPROVAL = 'pending approval';
    const ENROLLMENT_STATUS_WAIT = 'wait';
    const ENROLLMENT_STATUS_NOT_ENROLLED = 'not enrolled';
    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function user() {
        return $this->belongsTo(User::class,'student_user_id');
    }

    public function quizresult() {
        return $this->hasOne(QuizResult::class,'quiz_enrollment_id');
    }


    public function paymentProofs() {

        return $this->hasMany(QuizCertificationPayment::class,'quiz_enrollment_id');
    }


}
