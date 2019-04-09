<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
