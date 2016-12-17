<?php

namespace App\Facades;

use App\Address;

class AddressManager
{
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function create($array)
    {
        return $this->address->store($array);
    }

    public function update($array)
    {
        return $this->address->edit($array);
    }

    public function delete($id)
    {
        $this->address->del($id);
    }
}