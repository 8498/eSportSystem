<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Player;

class PlayerManager 
{
    public function __construct(Player $player)
    {
        $this->player = $player;
    }
}