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

    public function store($array)
    {
        $employee = new $this();

        $employee->firstname = $array['firstname'];
        $employee->lastname = $array['lastname'];
        $employee->office_id = $array['office'];
        $employee->save();

        return true;
    }

    public function edit($array)
    {
        $employee = $this->getById($array['id']);

        $employee->update([
            'firstname' => $array['firstname'],
            'lastname' => $array['lastname'],
            'office_id' => $array['office']
        ]);

        return true;
    }

    public function del($id)
    {
        $employee = $this->getById($id);

        $employee->delete();

        return true;
    }
}
