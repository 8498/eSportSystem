<?php

namespace App\Modules\Administration\Facades;

use App\Modules\Administration\Models\Office;

class OfficeManager 
{
    public function __construct(Office $office)
    {
        $this->office = $office;
    }

    public function getById($id)
    {
        return $this->office->getById($id);
    }

    public function getPaginateAll()
    {
        return $this->office->getPaginateAll();
    }

    public function create($array)
    {
        return $this->office->store($array);
    }

    public function update($array)
    {
        return $this->office->edit($array);
    }

    public function delete($id)
    {
        return $this->office->del($id);
    }

}