<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Employee;
use App\PersonalDetail;
use App\Address;
use App\Nationality;
use App\City;

class EmployeeManager 
{
    public function __construct(Employee $employee, PersonalDetail $personalDetail, Address $address, Nationality $nationality, City $city)
    {
        $this->employee = $employee;
        $this->personalDetail = $personalDetail;
        $this->address = $address;
        $this->nationality = $nationality;
        $this->city = $city;
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
        $city = $this->city->store($array);
        $array['city_id'] = $city->id;

        $nationality = $this->nationality->store($array);
        $array['nationality_id'] = $nationality->id;

        $address = $this->address->store($array);
        $array['address_id'] = $address->id;

        return $this->employee->store($array);
    }

    public function update($array)
    {
        if($this->nationality->edit($array))
        {
            if($this->address->edit($array))
            {
                if($this->employee->edit($array))
                {
                    if($this->personalDetail->edit($array))
                    {
                        return true;
                    }
                }
            }
        }
    }

    public function delete($id)
    {
        return $this->employee->del($id);
    }
}