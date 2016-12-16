<?php

namespace App\Modules\Teammanagement\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Teammanagement\Facades\PlayerManager;

class PlayerController extends Controller
{
    public function __construct(PlayerManager $playerManager)
    {
        $this->playerManager = $playerManager;
    }
}
