<?php

namespace App\Modules\Mail\Facades;

use Illuminate\Support\Facades\Mail;

use App\Modules\Mail\Mail\PasswordReset;
use App\Facades\UserManager;

class MailManager
{
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function resetPasswordEmail($id)
    {
        $user = $this->userManager->getById($id);
        $newpassword = $this->userManager->resetPassword($id);

        Mail::to('c36557e833-7a957b@inbox.mailtrap.io')->send(new PasswordReset($user, $newpassword));

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
