<?php

namespace App\Facades;

use App\PersonalDetail;
use App\Facades\AddressManager;


class PersonalDetailManager 
{

    public function __construct(PersonalDetail $personalDetail, AddressManager $addressManager)
    {
        $this->personalDetail = $personalDetail;
        $this->addressManager = $addressManager;
    }

    public function create($array)
    {
        return $this->personalDetail->store($array);
    }

    public function update($array)
    {
        $this->addressManager->update($array);
        $this->personalDetail->edit($array);
    }

}