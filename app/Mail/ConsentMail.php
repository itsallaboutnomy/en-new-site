<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consent,$type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consent, $type)
    {
        $this->consent  = $consent;
        $this->type = $type;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('enablers.app.mails.consent-mail')->subject($this->type);
    }
}
