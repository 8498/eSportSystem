<?php

namespace App\Modules\Mail\Facades;

use Illuminate\Support\Facades\Mail;

use App\Modules\Mail\Mail\PasswordReset;

class MailManager
{
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }

    public function resetPasswordEmail()
    {

        Mail::to('c36557e833-7a957b@inbox.mailtrap.io')->send(new $this->passwordReset);

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
