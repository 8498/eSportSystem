<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'birthday', 'phone_number', 'card_number', 'address_id', 'nationality_id'
    ];

    /* << relationships */

    public function employee()
    {
        return $this->belongsTo('App\Modules\Administration\Models\Employee');
    }

    public function address()
    {
        return $this->hasOne('App\Address','id','address_id');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    /* >> relationships */

    public function getById($id)
    {
        $personalDetail = $this::find($id);

        return $personalDetail;
    }

    public function store($array)
    { 
        $personalDetail = new $this();

        $personalDetail->birthday = $array['birthday'];
        $personalDetail->phone_number = $array['phone_number'];
        $personalDetail->card_number = $array['card_number'];
        $personalDetail->address_id = $array['address_id'];
        $personalDetail->nationality_id = $array['nationality_id'];

        $personalDetail->save();

        return $personalDetail;
    }

    public function edit($array)
    {
        $personalDetail = $this::find($array['personal_detail_id']);

        $personalDetail->update([
            'birthday' => $array['birthday'],
            'phone_number' => $array['phone_number'],
            'card_number' => $array['card_number'],
            'nationality_id' => $array['nationality_id']
        ]);
    }

    public function del($id)
    {
        $personalDetail = $this::find($id);

        $personalDetail->delete();

    }
}
