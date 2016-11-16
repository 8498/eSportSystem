<?php

namespace App\Modules\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class PasswordReset extends Mailable
{
     use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function build()
    {
        $subject = 'Resetowanie hasła.';

        return $this->view('mail::passwordreset')
            ->subject($subject);
    }
}
