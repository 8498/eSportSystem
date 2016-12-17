<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Player;
use App\Modules\Administration\Facades\EmployeeManager;

class PlayerManager
{
    public function __construct(Player $player, EmployeeManager $employeeManager)
    {
        $this->player = $player;
        $this->employeeManager = $employeeManager;
    }

    public function getById($id) 
    {
        return $this->player->getById($id);
    }

    public function getAll()
    {
        return $this->player->getAll();
    }

    public function create($array)
    {
        $employee = $this->employeeManager->create($array);

        $array['employee_id'] = $employee->id;

        return $this->player->store($array);
    }

    public function update($array)
    {
        $this->player->edit($array);
    }

    public function delete($id)
    {
        $this->player->del($id);
    }
}
