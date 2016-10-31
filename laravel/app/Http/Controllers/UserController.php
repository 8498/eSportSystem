<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('account\dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
