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

    public function scopeDocumento($query, $documento)
    {
        return $query->where('documento', 'like', '%' .$documento . '%');
    }

    public function scopeNombres($query, $nombres)
    {
        return $query->where('nombres', 'like', '%' .$nombres . '%');
    }

    public function scopeDepartamento_($query, $departamento_id)
    {
        if ($departamento_id) {
            return $query->where('departamento_id', $departamento_id);
        }
    }

    public function scopeMunicipio_($query, $municipio_id)
    {
        if ($municipio_id) {
            return $query->where('municipio_id', $municipio_id);
        }
    }

    public function scopeComuna_($query, $comuna_id)
    {
        if ($comuna_id) {
            return $query->where('comuna_id', $comuna_id);
        }
    }

    public function scopeBarrio_($query, $barrio_id)
    {
        if ($barrio_id) {
            return $query->where('barrio_id', $barrio_id);
        }
    }

    public function scopePuesto_($query, $puesto_id)
    {
        if ($puesto_id) {
            return $query->where('puesto_id', $puesto_id);
        }
    }

    public function scopeMesa_($query, $mesa_id)
    {
        if ($mesa_id) {
            return $query->where('mesa_id', $mesa_id);
        }
    }

    public function scopeUser_($query, $user_id)
    {
        if ($user_id) {
            return $query->where('user_id', $user_id);
        }
    }

    public function scopeActivo_($query, $activo)
    {
        if ($activo && $activo != 2) {
            return $query->where('activo', (bool)$activo);
        }
    }
}
