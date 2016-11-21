<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street_name', 'house_number', 'apartment_number'
    ];

    /* << relationships */

    public function personalDetail()
    {
        return $this->belongsTo('App\PersonalDetail');
    }

    /* >> relationships */
    
    public function store($array)
    {
        $address = new $this();

        $address->street_name = $array['street_name'];
        $address->house_number = $array['house_number'];
        $address->apartment_number = $array['apartment_number'];
        $address->save();

        return $address;
    }

    public function edit($array)
    {
        $address = $this::find($array['address_id']);

        $address->update([
            'street_name' => $array['street_name'],
            'house_number' => $array['house_number'],
            'apartment_number' => $array['apartment_number']
        ]);

        return true;
    }
}
