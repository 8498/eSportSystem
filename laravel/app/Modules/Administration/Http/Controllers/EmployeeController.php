<?php

namespace App\Modules\Administration\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Administration\Facades\EmployeeManager;

class EmployeeController extends Controller
{
    public function __construct(EmployeeManager $employeeManager)
    {
        $this->employeeManager = $employeeManager;
    }

    public function view()
    {
        $vars = $this->employeeManager->getPaginateAll();

        return view('administration::employees.index')->with('vars', $vars);
    }

    public function show($id)
    {
        $vars = $this->employeeManager->getById($id);
        return view('administration::employees.show')->with('vars', $vars);
    }

    public function create(Request $request)
    {
        if($this->employeeManager->create($request->all()))
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $vars = $this->employeeManager->getById($id);
        return view('administration::employees.edit')->with('vars', $vars);
    }

    public function update(Request $request)
    {
        if($this->employeeManager->update($request->all()))
        {
            return redirect()->route('employees.view');
        }
    }

    public function delete($id)
    {
        if($this->employeeManager->delete($id))
        {
            return redirect()->route('employees.view');
        }
    }
}
