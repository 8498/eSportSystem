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

    public function personalDetail()
    {
        return $this->hasOne('App\PersonalDetail', 'id', 'personal_detail_id');
    }

    public function office()
    {
        return $this->belongsTo('App\Modules\Administration\Models\Office');
    }

    /* >> relationships */

    public function getById($id)
    {
        $employee = $this::find($id);

        $personalDetail = $this::find($id)->personalDetail()->first();

        return $array = ['employee' => $employee, 'personalDetail' => $personalDetail];
    }

    public function getPaginateAll()
    {
        return $this::paginate(10);
    }

    public function store($array)
    {
        $employee = new $this();

        $personalDetail = $employee->personalDetail()->create([
            'age' => $array['age'],
            'phone_number' => $array['phone_number'],
            'card_number' => $array['card_number'],
            'address_id' => $array['address_id'],
            'nationality_id' => $array['nationality_id']
        ]);

        $employee->firstname = $array['firstname'];
        $employee->lastname = $array['lastname'];
        $employee->office_id = $array['office'];
        $employee->personal_detail_id = $personalDetail->id;
        $employee->save();

        return true;
    }

    public function edit($array)
    {
        $employee = $this::find($array['id']);

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
