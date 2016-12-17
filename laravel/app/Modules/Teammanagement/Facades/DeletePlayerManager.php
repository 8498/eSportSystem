<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Facades\PlayerManager;
use App\Modules\Administration\Facades\EmployeeManager;

class DeletePlayerManager
{
    public function __construct(EmployeeManager $employeeManager, PlayerManager $playerManager)
    {
        $this->employeeManager = $employeeManager;
        $this->playerManager = $playerManager;
    }

    public function delete($array)
    {
        if (isset($array['employee_id'])) {
            $employee = $this->employeeManager->getById($array['employee_id']);

            $playerId = $employee['employee']->player->id;

            $this->playerManager->delete($playerId);

            $this->employeeManager->delete($employee['employee']->id);
        } else{
            if (isset($array['player_id'])) {
                $player = $this->playerManager->getById($array['player_id']);

                $this->playerManager->delete($player->id);

                $this->employeeManager->delete($player->employee->id);
            }
        }
    }
}
