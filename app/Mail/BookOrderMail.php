<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $uniqueCode, $enrollFor, $user, $account1,$enrollFee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uniqueCode, $enrollFor, $user, $account, $enrollFee){
        $this->user = $user;
        $this->account1 = $account;
        $this->enrollFee = $enrollFee;
        $this->enrollFor = $enrollFor;
        $this->uniqueCode = $uniqueCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Enablers Book Order')->view('enablers.app.mails.book-order');
    }
}
