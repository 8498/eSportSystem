<?php

namespace App\Facades;

use App\Role;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class RoleManager 
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function ajaxGetAll()
    {
        $roles = $this->role->getAll();
        if(Request::ajax())
        {
            return Response::json($roles);
        }
        return $roles;
    }
}