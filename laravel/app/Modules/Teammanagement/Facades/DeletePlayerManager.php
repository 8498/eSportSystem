<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Facades\PlayerManager;
use App\Modules\Administration\Facades\EmployeeManager;
use App\Modules\Teammanagement\Facades\PlayerDetailManager;

class DeletePlayerManager
{
    public function __construct(EmployeeManager $employeeManager, PlayerManager $playerManager, PlayerDetailManager $playerDetailManager)
    {
        $this->employeeManager = $employeeManager;
        $this->playerManager = $playerManager;
        $this->playerDetailManager = $playerDetailManager;
    }

    public function delete($array)
    {
        if (isset($array['employee_id'])) {
            $employee = $this->employeeManager->getById($array['employee_id']);

            $playerId = $employee->player->id;

            $player = $this->playerManager->getById($playerId);

            $this->playerManager->delete($playerId);

            $this->playerDetailManager->delete($player->player_detail_id);

            $this->employeeManager->delete($employee->id);
        } else{
            if (isset($array['player_id'])) {
                $player = $this->playerManager->getById($array['player_id']);

                $this->playerManager->delete($player->id);

                $this->playerDetailManager->delete($player->player_detail_id);

                $this->employeeManager->delete($player->employee->id);
            }
        }
    }
}
