<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $customer;

    public function __construct($customer, $subject, $content)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->customer = $customer;
    }

    public function build()
    {
        return $this->view('emails.customer_email')
            ->subject($this->subject);
    }
}
