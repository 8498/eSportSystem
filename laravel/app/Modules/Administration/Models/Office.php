<?php

namespace App\Modules\Administration\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /* << relationships */

    public function employees()
    {
        return $this->hasMany('App\Modules\Administration\Models\Employee');
    }

    /* >> relationships */

    public static function getPlayer()
    {
        $player = Office::where('name', 'gracz')->first();

        $playerId = $player->id;
        
        return $playerId;
    }

    public function getById($id)
    {
        return $this::find($id);
    }

    public function getAll()
    {
        return $this::all();
    }

    public function getPaginateAll()
    {
        return $this::paginate(10);
    }

    public function store($array)
    {
        $office = new $this();

        $office->name = $array['name'];
        $office->save();

        return true;
    }

    public function edit($array)
    {
        $office = $this->getById($array['id']);

        $office->update([
            'name' => $array['name']
        ]);

        return true;
    }

    public function del($id)
    {
        $office = $this->getById($id);

        $office->delete();

        return true;
    }
}
