<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    const SUPERADMIN = 'superadmin';
    const ADMINISTRATOR = 'administrator';
    const COACH = 'COACH';
    const MANAGER = 'manager';
    const SCOUT = 'scout';

    protected $fillable = [
        'name'
    ];

    /* << relationships */

    public function users()
    {
        return $this->hasMany('App\User');
    }

    /* >> relationships */

    public function getById($id)
    {
        return $this::find($id);
    }

    public function getAll()
    {
        return $this::paginate(10);
    }

}
