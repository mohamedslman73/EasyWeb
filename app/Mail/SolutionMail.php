<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SolutionMail extends Mailable
{
    use Queueable, SerializesModels;
public $solution;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solution)
    {
        $this->solution = $solution;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.sendsolutions');
    }
}
