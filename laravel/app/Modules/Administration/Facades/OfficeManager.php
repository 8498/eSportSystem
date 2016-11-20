<?php

namespace App\Modules\Administration\Facades;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

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

    public function getAll()
    {
        $offices = $this->office->getAll();
        if(Request::ajax())
        {
            return Response::json($offices);
        }
        return $offices;
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