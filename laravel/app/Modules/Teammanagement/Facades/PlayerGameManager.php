<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Game;
use App\Modules\Teammanagement\Models\Player;

class PlayerGameManager 
{
    public function __construct(Game $game, Player $player)
    {
        $this->game = $game;
        $this->player = $player;
    }

    public function getGamesFromPlayer($playerId)
    {
        $player = $this->player->getById($playerId);
        
        $games = $player->games;

        return $games;
    }

    public function addGameToPlayer($array)
    {
        $player = $this->player->getById($array['player_id']);

        $player->games()->attach($array['game_id']);
    }

    public function removeGameFromPlayer($array)
    {
        $player = $this->player->getById($array['player_id']);

        $player->games()->detach($array['game_id']);
    }
}