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

    public function delete($id)
    {
        $personalDetail = $this->personalDetail->getById($id);

        $address_id = $personalDetail->address_id;

        $this->addressManager->delete($address_id);

        $this->personalDetail->del($id);
    }

}