<?php

namespace App\Modules\Administration\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Administration\Models\Office;

use App\Modules\Administration\Facades\EmployeeManager;
use App\Modules\Teammanagement\Facades\DeletePlayerManager;

use App\Modules\Administration\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(EmployeeManager $employeeManager, DeletePlayerManager $deletePlayerManager)
    {
        $this->employeeManager = $employeeManager;
        $this->deletePlayerManager = $deletePlayerManager;
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

    public function create(EmployeeRequest $request)
    {
        $this->employeeManager->create($request->all());
        return redirect()->back();
    }

    public function edit($id)
    {
        $vars = $this->employeeManager->getById($id);
        return view('administration::employees.edit')->with('vars', $vars);
    }

    public function update(Request $request)
    {
        $this->employeeManager->update($request->all());
        return redirect()->route('employees.view');
    }

    public function delete($id)
    {
        $employee = $this->employeeManager->getById($id);

        if ($employee->office_id == Office::getPlayer()->id) {
            $array['employee_id'] = $id;
            $this->deletePlayerManager->delete($array);
        } else {
            $this->employeeManager->delete($employee->id);
        }
        
        return redirect()->route('employees.view');
    }
}
