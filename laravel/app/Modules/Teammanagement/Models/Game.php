<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getById($id)
    {
        $game = $this::find($id);

        return $game;
    }

    public function getAll()
    {
        return $this::all();
    }

    public function store($array)
    {
        $game = new $this();

        $game->name = $array['name'];
        $game->save();

        return $game;
    }

    public function edit($array)
    {
        $game = $this::find($array['id']);

        $game->update([
            'name' => $array['name'],
        ]);
    }

    public function del($id)
    {
        $game = $this->getById($id);

        $game->delete();

        return true;
    }
}
