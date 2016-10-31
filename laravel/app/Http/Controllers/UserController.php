<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function authenticate(UserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('account\dashboard');
        }
        return redirect()->route('welcome');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
