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
        'age', 'phone_number', 'card_number'
    ];

    /* << relationships */

    public function employee()
    {
        return $this->belongsTo('App\Modules\Administration\Models\Employee');
    }

    /* >> relationships */

    public function edit($array)
    {
        $personalDetail = $this::find($array['personal_detail_id']);

        $personalDetail->update([
            'age' => $array['age'],
            'phone_number' => $array['phone_number'],
            'card_number' => $array['card_number']
        ]);

        return true;
    }
}
