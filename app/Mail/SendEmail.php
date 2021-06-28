<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Estado de compra';
    public $order;
    public $payment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$payment)
    {
        $this->order = $order;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send-message');
    }
}
