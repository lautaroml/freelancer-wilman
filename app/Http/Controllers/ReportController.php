<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Ciudadano;
use App\Comuna;
use App\Mesa;
use App\Municipio;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function municipios()
    {
        $results = Ciudadano::select('municipio_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('municipio_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = Municipio::find($result->municipio_id)->nombre;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function comunas()
    {
        $results = Ciudadano::select('comuna_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('comuna_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = Comuna::find($result->comuna_id)->nombre;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function barrios()
    {
        $results = Ciudadano::select('barrio_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('barrio_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = Barrio::find($result->barrio_id)->nombre;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function puestos()
    {
        $results = Ciudadano::select('puesto_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('puesto_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = Puesto::find($result->puesto_id)->nombre;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function mesas()
    {
        $results = Ciudadano::select('mesa_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('mesa_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = Mesa::find($result->mesa_id)->nombre;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function usuarios()
    {
        $results = Ciudadano::select('user_id', DB::raw('COUNT(id) as amount'))
            ->groupBy('user_id')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = User::find($result->user_id)->name;
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }

    public function activos()
    {
        $results = Ciudadano::select('activo', DB::raw('COUNT(id) as amount'))
            ->groupBy('activo')
            ->get();

        $label = [];
        $data = [];

        foreach ($results as $result) {
            $label[] = $result->activo ? 'activo' : 'inactivo';
            $data[] = $result->amount;
        }

        return view('admin.reportes.report', compact('label', 'data'));
    }
}
