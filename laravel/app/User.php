<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mnabialek\LaravelAuthorize\Contracts\Roleable as RoleableContract;

class User extends Authenticatable implements RoleableContract
{
    use \Mnabialek\LaravelAuthorize\Traits\Roleable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
