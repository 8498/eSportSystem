<?php

namespace App\Modules\Teammanagement\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{   
    // << relationship

    public function employee()
    {
        return $this->hasOne('App\Modules\Administration\Models\Employee');
    }

    // << relationship
}
