<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserCreateRequest;

use App\Facades\UserManager;

class UserController extends Controller
{
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function view()
    {
        $vars = $this->userManager->getPaginateAll();

        return view('users.index')->with('vars', $vars);
    }

    public function create(UserCreateRequest $request)
    {
        if($this->userManager->create($request->all()))
        {
            return redirect()->back();
        }
    }

    public function login(UserLoginRequest $request)
    {
        if($this->userManager->authenticate($request->all()))
        {
            return redirect()->intended('account\dashboard');
        }
        return redirect()->route('welcome');
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        $this->userManager->changeEmail($request->email);

        return redirect()->route('settings');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $this->userManager->changePassword($request->password);
        
        return redirect()->route('settings');
    }

    public function logout()
    {
        if($this->userManager->logout())
        {
            return redirect()->route('welcome');
        }
    }
}
