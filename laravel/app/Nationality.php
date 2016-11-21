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
        return $this->belongsTo('App\PersonalDetail');
    }

    /* >> relationships */

    public function store($array)
    {
        $nationality = new $this();

        $nationality->nationality_name = $array['nationality_name'];
        $nationality->save();

        return $nationality;
    }

    public function edit($array)
    {
        $nationality = $this::find($array['nationality_id']);

        $nationality->update([
            'nationality_name' => $array['nationality_name']
        ]);

        return true;
    }
}
