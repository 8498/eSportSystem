<?php

namespace App\Http\Controllers;

use App\Facades\UserManager;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function view()
    {
        $vars = $this->userManager->getAll();

        return view('users.index')->with('vars', $vars);
    }

    public function login(UserRequest $request)
    {
        if($this->userManager->authenticate($request->all()))
        {
            return redirect()->intended('account\dashboard');
        }
        return redirect()->route('welcome');
    }

    public function logout()
    {
        if($this->userManager->logout())
        {
            return redirect()->route('welcome');
        }
    }
}
