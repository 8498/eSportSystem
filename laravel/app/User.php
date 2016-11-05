<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* << relationships */

    public function role()
    {
        return $this->belongsTo('App\Role');
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

    public function hasRole($rolename)
    {
        if($this::role()->getResults()->name === $rolename)
        {
            return true;
        }
        return false;
    }
}
