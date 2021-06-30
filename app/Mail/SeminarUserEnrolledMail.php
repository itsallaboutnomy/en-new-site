<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeminarUserEnrolledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $uniqueCode, $enrollFor, $user, $seats, $account1;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uniqueCode, $enrollFor, $user, $seats, $account){
        $this->user = $user;
        $this->seats = $seats;
        $this->account1 = $account;
        $this->enrollFor = $enrollFor;
        $this->uniqueCode = $uniqueCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Enablers Seminar Enrollment')->view('enablers.app.mails.seminar-user-enrolled');
    }
}
