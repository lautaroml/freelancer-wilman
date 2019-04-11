<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function ciudadanos()
    {
        return $this->hasMany('App\Ciudadano');
    }
}
