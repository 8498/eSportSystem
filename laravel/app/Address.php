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
        'street_name', 'house_number', 'apartment_number', 'city_id'
    ];

    /* << relationships */

    public function personalDetail()
    {
        return $this->belongsTo('App\PersonalDetail');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /* >> relationships */
    
    public function store($array)
    {
        $address = new $this();

        $address->street_name = $array['street_name'];
        $address->house_number = $array['house_number'];
        $address->apartment_number = $array['apartment_number'];
        $address->city_id = $array['city_id'];
        $address->save();

        return $address;
    }

    public function edit($array)
    {
        $address = $this::find($array['address_id']);

        $city = $address->city()->update([
            'city_name' => $array['city_name'], 
            'postal_code' => $array['postal_code'], 
            'state' => $array['state'], 
            'country' => $array['country']
        ]);

        $address->update([
            'street_name' => $array['street_name'],
            'house_number' => $array['house_number'],
            'apartment_number' => $array['apartment_number']
        ]);

        return true;
    }
}
