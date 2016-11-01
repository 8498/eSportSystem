<?php

namespace App\Facades;

use App\User;

use Illuminate\Support\Facades\Auth;

class UserManager 
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->getAll();
    }

    public function authenticate($array)
    {
        $email = $array['email'];
        $password = $array['password'];
        
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return true;
        }
        return false;
    }

    public function changeEmail($email)
    {
        $user = $this->user->getById(Auth::user()->id);
        $user->update(['email' => $email]);
    }

    public function changePassword($password)
    {
        $user = $this->user->getById(Auth::user()->id);
        $user->update(['password' => bcrypt($password)]);
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}