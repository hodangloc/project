<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Buil the message.
     * 
     * @return $this
     */
     public function build()
     {
        return $this->from('loc3031998@gmail.com', "test")
        ->subject($this->data['subject'])
        ->view("emails.index")->with("data", $this->data);
     } 

}
