<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{   
    protected $fillable = [
        'status'
    ];

    // << relationship

    public function employee()
    {
        return $this->hasOne('App\Modules\Administration\Models\Employee', 'id', 'employee_id');
    }

    public function playerDetail()
    {
        return $this->hasOne('App\Modules\Teammanagement\Models\PlayerDetail', 'id', 'player_detail_id');
    }

    public function games()
    {
        return $this->belongsToMany('App\Modules\Teammanagement\Models\Game');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Modules\Teammanagement\Models\Team');
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
        $player->player_detail_id = $array['player_detail_id'];
        $player->status = $array['status'];
        $player->save();

        return $player;
    }

    public function edit($array)
    {
        $player = $this::find($array['id']);

        $player->playerDetail->update([
            'nickname' => $array['nickname']
        ]);
    }

    public function del($id)
    {
        $player = $this::find($id);

        $player->delete();

        return true;
    }

    public function getStatus($id)
    {
        $player = $this::find($id);

        $status = $player->status;

        return $status;
    }

    public function changeStatus($id, $status)
    {
        $player = $this::find($id);

        $player->update([
            'status' => $status
        ]);
    }
}
