<?php

namespace App\Modules\Teammanagement\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Teammanagement\Facades\PlayerManager;
use App\Modules\Teammanagement\Facades\DeletePlayerManager;

class PlayerController extends Controller
{
    public function __construct(PlayerManager $playerManager, DeletePlayerManager $deletePlayerManager)
    {
        $this->playerManager = $playerManager;
        $this->deletePlayerManager = $deletePlayerManager;
    }

    public function view()
    {
        $vars = $this->playerManager->getAll();

        return view('teammanagement::players.index')->with('vars', $vars);
    }

    public function show($id)
    {
        $vars = $this->playerManager->getById($id);

        return view('teammanagement::players.show')->with('vars', $vars);
    }

    public function create(Request $request)
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

    public function update(Request $request)
    {
        $this->playerManager->update($request->all());

        return redirect()->route('players.view');
    }

    public function delete($id)
    {
        $array['player_id'] = $id;

        $this->deletePlayerManager->delete($array);
        
        return redirect()->route('players.view');
    }
}
