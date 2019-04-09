<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
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

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }

    public function mesa()
    {
        return $this->belongsTo('App\Mesa');
    }

    public function isActive()
    {
        return $this->activo == 1 ? 'Si' : 'No';
    }
}
