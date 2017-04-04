<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Event
     */
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@nainam.com', 'Nainam')
            ->subject('Hi '.$this->event['user']->first_name.'!, Please confirm your email address.')
            ->view('emails.user.activated')
            ->with([
                'email' => $this->event['user']->email,
                'token' => $this->event['user']->token
            ]);
    }
}
