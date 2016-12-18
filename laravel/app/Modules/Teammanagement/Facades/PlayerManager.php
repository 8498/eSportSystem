<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Player;
use App\Modules\Administration\Facades\EmployeeManager;
use App\Modules\Teammanagement\Facades\PlayerDetailManager;

class PlayerManager
{
    public function __construct(Player $player, EmployeeManager $employeeManager, PlayerDetailManager $playerDetailManager)
    {
        $this->player = $player;
        $this->employeeManager = $employeeManager;
        $this->playerDetailManager = $playerDetailManager;
    }

    public function getById($id) 
    {
        return $this->player->getById($id);
    }

    public function getAll($status)
    {
        return $this->player->getAll()->where('status', $status);
    }

    public function create($array)
    {
        $employee = $this->employeeManager->create($array);

        $array['employee_id'] = $employee->id;

        $playerDetail = $this->playerDetailManager->create($array);

        $array['player_detail_id'] = $playerDetail->id;

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

    public function setStatusPlayer($id)
    {
        $this->player->changeStatus($id, 'player');
    }

    public function setStatusCandidate($id)
    {
        $this->player->changeStatus($id, 'candidate');
    }
}
