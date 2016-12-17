<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\PlayerDetail;

class PlayerDetailManager
{
    public function __construct(PlayerDetail $playerDetail)
    {
        $this->playerDetail = $playerDetail;
    }

    public function create($array)
    {
        return $this->playerDetail->store($array); 
    }

    public function delete($id)
    {
        $this->playerDetail->del($id);
    }
}