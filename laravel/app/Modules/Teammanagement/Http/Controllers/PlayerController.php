<?php

namespace App\Modules\Teammanagement\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Teammanagement\Facades\PlayerManager;
use App\Modules\Teammanagement\Facades\DeletePlayerManager;
use App\Modules\Teammanagement\Facades\PlayerGameManager;
use App\Modules\Teammanagement\Facades\PlayerTeamManager;

use App\Modules\Teammanagement\Http\Requests\CreatePlayerRequest;
use App\Modules\Teammanagement\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    public function __construct(PlayerManager $playerManager, DeletePlayerManager $deletePlayerManager, PlayerGameManager $playerGameManager, PlayerTeamManager $playerTeamManager)
    {
        $this->playerManager = $playerManager;
        $this->deletePlayerManager = $deletePlayerManager;
        $this->playerGameManager = $playerGameManager;
        $this->playerTeamManager = $playerTeamManager;
    }

    public function view($status)
    {
        $vars = $this->playerManager->getAll($status);

        return view('teammanagement::players.index')->with(['vars' => $vars, 'status' => $status]);
    }

    public function show($id)
    {
        $vars = $this->playerManager->getById($id);

        return view('teammanagement::players.show')->with('vars', $vars);
    }

    public function create(CreatePlayerRequest $request)
    {
        if ($this->playerManager->create($request->all())) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $vars = $this->playerManager->getById($id);

        return view('teammanagement::players.edit')->with('vars', $vars);
    }

    public function update(PlayerRequest $request)
    {
        $this->playerManager->update($request->all());

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $array['player_id'] = $id;

        $this->deletePlayerManager->delete($array);
        
        return redirect()->route('dashboard');
    }

    public function addGame(Request $request)
    {
        $array = $request->all();
        
        $this->playerGameManager->addGameToPlayer($array);

        return redirect()->back();
    }

    public function removeGame(Request $request)
    {
        $array = $request->all();
        
        $this->playerGameManager->removeGameFromPlayer($array);

        return redirect()->back();
    }

    public function addToTeam(Request $request)
    {
        $array = $request->all();

        $this->playerTeamManager->addTeamToPlayer($array);

        return redirect()->back();
    }

    public function removeFromTeam(Request $request)
    {
        $array = $request->all();

        $this->playerTeamManager->removeTeamFromPlayer($array);

        return redirect()->back();
    }  

    public function changeStatusToPlayer($id)
    {
        $this->playerManager->setStatusPlayer($id);

        return redirect()->route('dashboard');
    } 

    public function changeStatusToCandidate($id)
    {
        $this->playerManager->setStatusCandidate($id);

        return redirect()->route('dashboard');
    } 
}
