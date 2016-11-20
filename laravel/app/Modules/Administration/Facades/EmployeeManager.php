<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Employee;

class EmployeeManager 
{
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function getById($id)
    {
        return $this->employee->getById($id);
    }

    public function getPaginateAll()
    {
        return $this->employee->getPaginateAll();
    }

    public function create($array)
    {
        return $this->employee->store($array);
    }

    public function update($array)
    {
        return $this->employee->edit($array);
    }

    public function delete($id)
    {
        return $this->employee->del($id);
    }
}