<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_name', 'postal_code', 'state', 'country'
    ];

    /* << relationships */

    public function address()
    {
        return $this->hasMany('App\Address','city_id','id');
    }

    /* >> relationships */

    public function store($array)
    {
        $cities = $this::all();

        $found_city = null;

        foreach ($cities as $city) {
            if ($city->city_name === $array['city_name']) {
                $found_city = $city;
                break;
            }
        }
        if ($found_city != null) {
            $return = $found_city;
        } else {
            $city = new $this();

            $city->city_name = $array['city_name'];
            $city->postal_code = $array['postal_code'];
            $city->state = $array['state'];
            $city->country = $array['country'];
            $city->save();

            $return = $city;
        }

        return $return;
    }
}
