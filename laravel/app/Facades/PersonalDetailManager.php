<?php

namespace App\Facades;

use App\PersonalDetail;
use App\Address;


class PersonalDetailManager 
{

    public function __construct(PersonalDetail $personalDetail, Address $address)
    {
        $this->personalDetail = $personalDetail;
        $this->address = $address;
    }

    public function create($array)
    {
        return $this->personalDetail->store($array);
    }

    public function update($array)
    {
        $this->address->edit($array);
        $this->personalDetail->edit($array);
    }

}