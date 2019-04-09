<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
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
