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

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        $subject = 'eSportSystem - Reset hasła.';

        return $this->view('mail::passwordreset')
            ->subject($subject)
            ->with([
                'user' => $this->user,
                'password' => $this->password
            ]);
    }
}
