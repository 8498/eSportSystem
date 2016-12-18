<?php 

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Player;
use App\Modules\Teammanagement\Models\Team;

class PlayerTeamManager
{
    public function __construct(Player $player, Team $team)
    {
        $this->player = $player;
        $this->team = $team;
    }

    public function getTeamsFromPlayer($playerId)
    {
        $player = $this->player->getById($playerId);
        
        $teams = $player->teams;

        return $teams;
    }

    public function getPlayersFromTeam($teamId)
    {
        $team = $this->team->getById($teamId);
        
        $players = $team->players;

        return $players;
    }

    public function addTeamToPlayer($array)
    {
        $player = $this->player->getById($array['player_id']);

        $player->teams()->attach($array['team_id']);
    }

    public function removeTeamFromPlayer($array)
    {
        $player = $this->player->getById($array['player_id']);

        $player->teams()->detach($array['team_id']);
    }
}