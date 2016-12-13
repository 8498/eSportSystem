<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Game;

class GameManager 
{   
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function getById($id)
    {
        return $this->game->getById($id);
    }

    public function getAll()
    {
        return $this->game->getAll();
    }

    public function create($array)
    {
        return $this->game->store($array);
    }

    public function update($array)
    {
        $this->game->edit($array);
    }

    public function delete($id)
    {
        return $this->game->del($id);
    }
}