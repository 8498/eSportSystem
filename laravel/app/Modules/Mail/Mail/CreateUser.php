<?php

namespace App\Modules\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class CreateUser extends Mailable
{
     use Queueable, SerializesModels;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        $subject = 'eSportSystem - Konto utworzone';

        return $this->view('mail::createuser')
            ->subject($subject)
            ->with([
                'user' => $this->user,
                'password' => $this->password
            ]);
    }
}
