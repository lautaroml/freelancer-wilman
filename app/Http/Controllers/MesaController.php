<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Comuna;
use App\Mesa;
use App\Puesto;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::paginate(10);
        return view('admin.mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $puestos = Puesto::all()->pluck('nombre', 'id');
        return view('admin.mesas.create', compact('comunas', 'barrios', 'puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mesa = new Mesa();
        $mesa->nombre = $request->get('nombre');
        $mesa->comuna_id = $request->get('comuna_id');
        $mesa->barrio_id = $request->get('barrio_id');
        $mesa->puesto_id = $request->get('puesto_id');
        $mesa->save();

        return redirect()->route('admin.mesas.index')->with(['success' => 'Mesa creada correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $puestos = Puesto::all()->pluck('nombre', 'id');
        return view('admin.mesas.edit', compact('mesa', 'comunas', 'barrios', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        $mesa->nombre = $request->get('nombre');
        $mesa->comuna_id = $request->get('comuna_id');
        $mesa->barrio_id = $request->get('barrio_id');
        $mesa->puesto_id = $request->get('puesto_id');
        $mesa->save();

        return redirect()->route('admin.mesas.index')->with(['success' => 'Mesa editada correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        //
    }
}
