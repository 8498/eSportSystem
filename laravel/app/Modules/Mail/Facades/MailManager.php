<?php

namespace App\Modules\Mail\Facades;

use Illuminate\Support\Facades\Mail;

use App\Modules\Mail\Mail\PasswordReset;
use App\Modules\Mail\Mail\CreateUser;
use App\Facades\UserManager;

class MailManager
{
    public function resetPasswordEmail($user, $password)
    {
        Mail::to($user->email)->send(new PasswordReset($user, $password));

        return $this->checkFailures();
    }

    public function createUserEmail($user, $password)
    {
        Mail::to($user->email)->send(new CreateUser($user, $password));

        return $this->checkFailures();
    }
    
    //@TODO create handling of failures
    public function checkFailures()
    {
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }
}
