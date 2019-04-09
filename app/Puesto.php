<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    public function barrio()
    {
        return $this->belongsTo('App\Barrio');
    }

    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
