<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject)
    {
        //
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('mail.confirm-order')->with('content','Noi dung');
    }
}
