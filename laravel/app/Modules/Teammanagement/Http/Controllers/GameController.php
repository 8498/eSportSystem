<?php

namespace App\Modules\Teammanagement\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Teammanagement\Facades\GameManager;

class GameController extends Controller
{
    public function __construct(GameManager $gameManager)
    {
        $this->gameManager = $gameManager;
    }

    public function view()
    {
        $vars = $this->gameManager->getAll();

        return view('teammanagement::games.index')->with('vars', $vars);
    }

    public function create(Request $request)
    {
        if($this->gameManager->create($request->all()))
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $vars = $this->gameManager->getById($id);

        return view('teammanagement::games.edit')->with('vars', $vars);
    }

    public function update(Request $request)
    {
        $this->gameManager->update($request->all());
        return redirect()->route('games.view');
    }

    public function delete($id)
    {
        if($this->gameManager->delete($id))
        {
            return redirect()->route('games.view');
        }
    }
}
