<?php

namespace App\Modules\Mail\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Modules\Mail\Mail\PasswordReset;

class MailController extends Controller
{
    public function sendResetPasswordEmail(){

        Mail::to('c36557e833-7a957b@inbox.mailtrap.io')->send(new PasswordReset);

        return view('welcome');

    }
}
