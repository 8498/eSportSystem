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

    public function store($array)
    {
        $nationalities = $this::all();

        $found_nationality = null;

        foreach ($nationalities as $nationality) {
            if ($nationality->nationality_name === $array['nationality_name']) {
                $found_nationality = $nationality;
                break;
            }
        }
        if ($found_nationality != null) {
            $return = $found_nationality;
        } else {
            $nationality = new $this();

            $nationality->nationality_name = $array['nationality_name'];
            $nationality->save();

            $return = $nationality;
        }

        return $return;
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
