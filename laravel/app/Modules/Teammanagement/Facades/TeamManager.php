<?php

namespace App\Modules\Teammanagement\Facades;

use App\Modules\Teammanagement\Models\Team;

class TeamManager 
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function getById($id)
    {
        return $this->team->getById($id);
    }

    public function getAll()
    {
        return $this->team->getAll();
    }

    public function create($array)
    {
        return $this->team->store($array);
    }

    public function update($array)
    {
        $this->team->edit($array);
    }

    public function delete($id)
    {
        return $this->team->del($id);
    }
}