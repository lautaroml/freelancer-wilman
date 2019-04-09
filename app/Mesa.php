<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function barrio()
    {
        return $this->belongsTo('App\Barrio');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }
}
