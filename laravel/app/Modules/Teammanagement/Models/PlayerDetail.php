<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerDetail extends Model
{
    protected $fillable = [
        'nickname'
    ];

    // << relationship

    public function player()
    {
        return $this->belongsTo('App\Modules\Teammanagement\Models\Player');
    }

    // << relationship

    public function getById($id)
    {
        $playerDetail = $this::find($id);

        return $playerDetail;
    }

    public function store($array)
    {
        $playerDetail = new $this();

        $playerDetail->nickname = $array['nickname'];
        $playerDetail->save();

        return $playerDetail;
    }

    public function edit($array)
    {
        $playerDetail = $this::find($array['id']);

        $playerDetail->update([
            'nickname' => $array['nickname']
        ]);
    }

    public function del($id)
    {
        $playerDetail = $this->getById($id);

        $playerDetail->delete();
    }
}
