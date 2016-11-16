<?php

namespace App\Modules\Mail\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Mail\Facades\MailManager;

class MailController extends Controller
{

    public function __construct(MailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    public function sendResetPasswordEmail()
    {

        if ($this->mailManager->resetPasswordEmail()) {
            return view('welcome');
        }
    }
}
