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
        'name', 'email', 'password'
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

    public function store($array)
    {
        $user = new $this();

        $user->name = $array['name'];
        $user->email = $array['email'];
        $user->password = bcrypt($array['password']);
        $user->role_id = $array['role'];
        $user->save();

        return true;
    }

    public function edit($array)
    {
        $user = $this->getById($array['id']);

        $user->update([
            'name' => $array['name'],
            'email' => $array['email']
        ]);

        return true;
    }

    public function getById($id)
    {
        return $this::find($id);
    }

    public function getPaginateAll()
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
