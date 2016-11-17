<?php

namespace App\Modules\Administration\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname'
    ];

    /* << relationships */

    public function office()
    {
        return $this->belongsTo('App\Modules\Administration\Models\Office');
    }

    /* >> relationships */

    public function getById($id)
    {
        return $this::find($id);
    }

    public function getPaginateAll()
    {
        return $this::paginate(10);
    }
}
