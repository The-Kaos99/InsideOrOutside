<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassProfesores extends Mailable
{
    use Queueable, SerializesModels;

    public $subject='Inside or Outside Validation System';
    
    public $password;
    public $profesor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password , $profesor)
    {
        $this->password=$password;
        $this->profesor=$profesor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_new_profesor');
    }
}
