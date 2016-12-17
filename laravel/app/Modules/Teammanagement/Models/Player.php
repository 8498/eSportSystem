<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    // << relationship

    public function employee()
    {
        return $this->hasOne('App\Modules\Administration\Models\Employee', 'id', 'employee_id');
    }

    // << relationship

    public function getById($id)
    {
        $player = $this::find($id);

        return $player;
    }

    public function getAll()
    {
        return $this::all();
    }

    public function store($array)
    {
        $player = new $this();

        $player->employee_id = $array['employee_id'];
        $player->save();

        return $player;
    }

    public function edit($array)
    {
        $player = $this::find($array['id']);

        $player->update([
            'employee_id' => $array['employee_id']
        ]);
    }

    public function del($id)
    {
        $player = $this->getById($id);

        $player->delete();

        return true;
    }
}
