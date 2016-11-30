<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Employee;
use App\Facades\PersonalDetailManager;
use App\Facades\AddressManager;
use App\Facades\NationalityManager;
use App\Facades\CityManager;

class EmployeeManager 
{
    public function __construct(Employee $employee, PersonalDetailManager $personalDetailManager, AddressManager $addressManager, NationalityManager $nationalityManager, CityManager $cityManager)
    {
        $this->employee = $employee;
        $this->personalDetailManager = $personalDetailManager;
        $this->addressManager = $addressManager;
        $this->nationalityManager = $nationalityManager;
        $this->cityManager = $cityManager;
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
        $city = $this->cityManager->create($array);
        $array['city_id'] = $city->id;

        $address = $this->addressManager->create($array);
        $array['address_id'] = $address->id;

        $nationality = $this->nationalityManager->create($array);
        $array['nationality_id'] = $nationality->id;

        $personalDetail = $this->personalDetailManager->create($array);
        $array['personal_detail_id'] = $personalDetail->id;

        return $this->employee->store($array);
    }

    public function update($array)
    {
        $city = $this->cityManager->create($array);
        $array['city_id'] = $city->id;

        $nationality = $this->nationalityManager->create($array);
        $array['nationality_id'] = $nationality->id;

        $this->employee->edit($array);
        $this->personalDetailManager->update($array);
    }

    public function delete($id)
    {
        return $this->employee->del($id);
    }
}