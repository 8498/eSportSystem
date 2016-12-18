<?php

namespace App\Modules\Teammanagement\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Teammanagement\Facades\TeamManager;
use App\Modules\Teammanagement\Facades\TeamGameManager;
use App\Modules\Teammanagement\Facades\GameManager;

use App\Modules\Teammanagement\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    public function __construct(TeamManager $teamManager, TeamGameManager $teamGameManager, GameManager $gameManager)
    {
        $this->teamManager = $teamManager;
        $this->teamGameManager = $teamGameManager;
        $this->gameManager = $gameManager;
    }

    public function view()
    {
        $vars = $this->teamManager->getAll();

        return view('teammanagement::teams.index')->with('vars', $vars);
    }

    public function show($id)
    {
        $vars = $this->teamManager->getById($id);

        return view('teammanagement::teams.show')->with('vars', $vars);
    }

    public function create(TeamRequest $request)
    {
        if($this->teamManager->create($request->all()))
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $vars = $this->teamManager->getById($id);

        return view('teammanagement::teams.edit')->with('vars', $vars);
    }

    public function update(TeamRequest $request)
    {
        $this->teamManager->update($request->all());

        return redirect()->route('teams.view');
    }

    public function delete($id)
    {
        if($this->teamManager->delete($id))
        {
            return redirect()->route('teams.view');
        }
    }

    public function addGame(Request $request)
    {
        $array = $request->all();
        
        $this->teamGameManager->addGameToTeam($array);

        return redirect()->back();
    }

    public function removeGame(Request $request)
    {
        $array = $request->all();
        
        $this->teamGameManager->removeGameFromTeam($array);

        return redirect()->back();
    }
}
