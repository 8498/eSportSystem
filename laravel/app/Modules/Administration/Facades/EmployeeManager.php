<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Employee;
use App\PersonalDetail;

class EmployeeManager 
{
    public function __construct(Employee $employee, PersonalDetail $personalDetail)
    {
        $this->employee = $employee;
        $this->personalDetail = $personalDetail;
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
        if($this->employee->edit($array))
        {
            if($this->personalDetail->edit($array))
            {
                return true;
            }
        }
    }

    public function delete($id)
    {
        return $this->employee->del($id);
    }
}