<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrainingUserEnrolledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $uniqueCode, $enrollFor, $enrollFee, $user, $challanPath, $account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $uniqueCode,
        $enrollFor,
        $enrollFee,
        $user,
        $account,
        $challanPath
    ){
        $this->user = $user;
        $this->account = $account;
        $this->enrollFee = $enrollFee;
        $this->enrollFor = $enrollFor;
        $this->uniqueCode = $uniqueCode;
        $this->challanPath = $challanPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Enablers Training Enrollment')->view('enablers.app.mails.training-user-enrolled');
    }
}
