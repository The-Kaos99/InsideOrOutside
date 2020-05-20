<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassPadres extends Mailable
{
    use Queueable, SerializesModels;
    public $subject='Inside or Outside Validation System';
    
    public $password;
    public $padre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $padre)
    {
        $this->password=$password;
        $this->padre=$padre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_new_padre');
    }
}
