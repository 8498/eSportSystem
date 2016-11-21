<?php

namespace App\Facades;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Modules\Mail\Facades\MailManager;

class UserManager 
{
    public function __construct(User $user, MailManager $mailManager)
    {
        $this->user = $user;
        $this->mailManager = $mailManager;
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
        $password = $array['password'];

        $user = $this->user->store($array);

        $this->mailManager->createUserEmail($user, $password);
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

        $this->mailManager->resetPasswordEmail($user, $password);
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}