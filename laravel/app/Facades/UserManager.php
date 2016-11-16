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

    public function getById($id)
    {
        return $this->user->getById($id);    
    }

    public function getPaginateAll()
    {
        return $this->user->getPaginateAll();
    }

    public function create($array)
    {
        return $this->user->store($array);
    }

    public function update($array)
    {
        return $this->user->edit($array);
    }

    public function delete($id)
    {
        return $this->user->del($id);
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

    public function resetPassword($id)
    {
        $password = 'qwerty123';

        $user = $this->user->getById($id);
        $user->update(['password' => bcrypt($password)]);

        return $password;
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}