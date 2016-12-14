<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'tag'
    ];

    public function getById($id)
    {
        $team = $this::find($id);

        return $team;
    }

    public function getAll()
    {
        return $this::all();
    }

    public function store($array)
    {
        $team = new $this();

        $team->name = $array['name'];
        $team->tag = $array['tag'];
        $team->save();

        return $team;
    }

    public function edit($array)
    {
        $team = $this::find($array['id']);

        $team->update([
            'name' => $array['name'],
            'tag' => $array['tag']
        ]);
    }

    public function del($id)
    {
        $team = $this->getById($id);

        $team->delete();

        return true;
    }
}
