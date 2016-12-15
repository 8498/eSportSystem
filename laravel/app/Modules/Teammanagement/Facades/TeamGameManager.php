<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Game;
use App\Modules\Teammanagement\Models\Team;

class TeamGameManager 
{
    public function __construct(Game $game, Team $team)
    {
        $this->game = $game;
        $this->team = $team;
    }

    public function getGamesFromTeam($teamId)
    {
        $team = $this->team->getById($teamId);
        
        $games = $team->games;

        return $games;
    }

    public function addGameToTeam($array)
    {
        $team = $this->team->getById($array['team_id']);

        $team->games()->attach($array['game_id']);
    }

    public function removeGameFromTeam($array)
    {
        $team = $this->team->getById($array['team_id']);

        $team->games()->detach($array['game_id']);
    }
}