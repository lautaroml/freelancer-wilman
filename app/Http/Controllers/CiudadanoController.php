<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Ciudadano;
use App\Comuna;
use App\Departamento;
use App\Mesa;
use App\Municipio;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CiudadanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\auth()->user()->isAdmin()) {
            $departamentos = Departamento::all()->pluck('nombre', 'id');
            $users = User::all()->pluck('name', 'id');
            $ciudadanos = Ciudadano::documento(\request('documento'))
                ->nombres(\request('nombres'))
                ->departamento_(\request('departamento_id'))
                ->municipio_(\request('municipio_id'))
                ->comuna_(\request('comuna_id'))
                ->barrio_(\request('barrio_id'))
                ->puesto_(\request('puesto_id'))
                ->mesa_(\request('mesa_id'))
                ->user_(\request('user_id'))
                ->where('activo', 'like', '%' . \request('activo') . '%')
                ->paginate(10);

            return view('admin.ciudadanos.index', compact('ciudadanos', 'departamentos', 'users'));
        }
        $ciudadanos = Ciudadano::documento(\request('documento'))->where('user_id', \auth()->user()->id)->paginate(10);
        return view('public.ciudadanos.index', compact('ciudadanos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $puestos = Puesto::all()->pluck('nombre', 'id');
        $mesas   = Mesa::all()->pluck('nombre', 'id');
        return view('public.ciudadanos.create', compact(
            'departamentos', 'municipios', 'comunas',
            'barrios', 'puestos', 'mesas'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Ciudadano::where('documento', $request->get('documento'))->first()) {
            return redirect()->back()->with(['error' => 'El ciudadano ya existe!'])->withInput(Input::all());
        }

        $validate = Validator::make($request->all(), [
            'documento' => ['required', 'numeric', 'unique:ciudadanos'],
            'email' => ['email', 'nullable', 'unique:ciudadanos']
        ]);

        $validate->validate();

        $ciudadano = new Ciudadano();
        $ciudadano->nombres = $request->get('nombres');
        $ciudadano->documento = $request->get('documento');
        $ciudadano->telefono = $request->get('telefono');
        $ciudadano->telefono_2 = $request->get('telefono_2');
        $ciudadano->telefono_3 = $request->get('telefono_3');
        $ciudadano->direccion = $request->get('direccion');
        $ciudadano->departamento_id = $request->get('departamento_id');
        $ciudadano->municipio_id = $request->get('municipio_id');
        $ciudadano->comuna_id = $request->get('comuna_id');
        $ciudadano->barrio_id = $request->get('barrio_id');
        $ciudadano->puesto_id = $request->get('puesto_id');
        $ciudadano->mesa_id = $request->get('mesa_id');
        $ciudadano->email = $request->get('email');
        $ciudadano->activo = (bool) $request->get('activo');
        $ciudadano->user_id = Auth::user()->id;
        $ciudadano->save();

        return redirect()->route('public.ciudadanos.index')->with(['success' => 'Ciudadano creado correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudadano  $ciudadano
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudadano $ciudadano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudadano  $ciudadano
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudadano $ciudadano)
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $puestos = Puesto::all()->pluck('nombre', 'id');
        $mesas   = Mesa::all()->pluck('nombre', 'id');
        return view('public.ciudadanos.edit', compact(
            'departamentos', 'municipios', 'comunas',
            'barrios', 'puestos', 'mesas', 'ciudadano'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudadano  $ciudadano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudadano $ciudadano)
    {
        $ciudadano->nombres = $request->get('nombres');
        $ciudadano->documento = $request->get('documento');
        $ciudadano->telefono = $request->get('telefono');
        $ciudadano->telefono_2 = $request->get('telefono_2');
        $ciudadano->telefono_3 = $request->get('telefono_3');
        $ciudadano->direccion = $request->get('direccion');
        $ciudadano->departamento_id = $request->get('departamento_id');
        $ciudadano->municipio_id = $request->get('municipio_id');
        $ciudadano->comuna_id = $request->get('comuna_id');
        $ciudadano->barrio_id = $request->get('barrio_id');
        $ciudadano->puesto_id = $request->get('puesto_id');
        $ciudadano->mesa_id = $request->get('mesa_id');
        $ciudadano->email = $request->get('email');
        $ciudadano->activo = (bool) $request->get('activo');
        $ciudadano->user_id = Auth::user()->id;
        $ciudadano->save();

        return redirect()->route('public.ciudadanos.index')->with(['success' => 'Ciudadano editado correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudadano  $ciudadano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudadano $ciudadano)
    {
        //
    }
}
