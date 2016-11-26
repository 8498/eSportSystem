<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Employee;
use App\Facades\PersonalDetailManager;
use App\Address;
use App\Nationality;
use App\City;

class EmployeeManager 
{
    public function __construct(Employee $employee, PersonalDetailManager $personalDetailManager, Address $address, Nationality $nationality, City $city)
    {
        $this->employee = $employee;
        $this->personalDetailManager = $personalDetailManager;
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

        $personalDetail = $this->personalDetailManager->create($array);
        $array['personal_detail_id'] = $personalDetail->id;

        return $this->employee->store($array);
    }

    public function update($array)
    {
        $this->employee->edit($array);
        $this->personalDetailManager->update($array);
    }

    public function delete($id)
    {
        return $this->employee->del($id);
    }
}