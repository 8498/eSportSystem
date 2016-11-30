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
        return $this->hasMany('App\Address', 'city_id', 'id');
    }

    /* >> relationships */

    public function getById($id)
    {
        $city = $this::find($id);

        return $city;
    }

    public function getByName($name)
    {
        $city = $this::where('city_name', $name)->first();

        return $city;
    }

    public function getAll()
    {
        return $this::all();
    }

    public function store($array)
    {
        $city = new $this();

        $city->city_name = $array['city_name'];
        $city->postal_code = $array['postal_code'];
        $city->state = $array['state'];
        $city->country = $array['country'];
        $city->save();

        return $city;
    }
}
