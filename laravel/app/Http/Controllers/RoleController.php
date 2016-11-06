<?php

namespace App\Http\Controllers;

use App\Facades\RoleManager;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(RoleManager $roleManager)
    {
        $this->roleManager = $roleManager;
    }

    public function ajaxGetAll()
    {
        return $this->roleManager->ajaxGetAll();
    }
}
