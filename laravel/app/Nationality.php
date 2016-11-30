<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nationality_name'
    ];

    /* << relationships */

    public function personalDetail()
    {
        return $this->hasMany('App\PersonalDetail','nationality_id','id');
    }

    /* >> relationships */

    public function getById($id)
    {
        $nationality = $this::find($id);

        return $nationality;
    }

    public function getByName($name)
    {
        $nationality = $this::where('nationality_name', $name)->first();

        return $nationality;
    }

    public function getAll()
    {
        return $this::all();
    }

    public function store($array)
    {
        $nationality = new $this();

        $nationality->nationality_name = $array['nationality_name'];
        $nationality->save();

        return $nationality;
    }
}
