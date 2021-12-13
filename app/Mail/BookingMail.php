<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
//        Mail::send(['html'=>'email.booking'], $data, function($message) {
//            $message->to('ethemkizil@gmail.com', 'Tutorials Point')->subject
//            ('Laravel Basic Testing Mail');
//            $message->from('me@ethemkizil.com','Ethem KIZIL');
//        });

    public $bookingId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@dalamanairport.com')->view('email.booking')->with(["booking" => $this->bookingId]);
    }
}
