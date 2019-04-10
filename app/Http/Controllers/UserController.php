<?php

namespace App\Http\Controllers;

use App\Meta;
use App\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = Perfil::all()->pluck('nombre', 'id');
        return view('admin.users.create', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $validate->validate();

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->perfil_id = $request->get('perfil_id');
        $user->save();

        if ($request->get('total') && $request->get('fecha')) {
            $meta = new Meta();
            $meta->user_id = $user->id;
            $meta->total = $request->get('total');
            $meta->fecha = $request->get('fecha');
            $meta->save();
        }

        return redirect()->route('admin.users.index')->with(['success' => 'Usuario creado correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $perfiles = Perfil::all()->pluck('nombre', 'id');
        $meta = Meta::where('user_id', $user->id)->first();
        @$user->total = $meta->total;
        @$user->fecha = $meta->fecha;
        return view('admin.users.edit', compact('user', 'perfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->perfil_id = $request->get('perfil_id');
        $user->save();

        if ($request->get('total') && $request->get('fecha')) {
            $meta = Meta::where('user_id', $user->id)->first();
            if (is_null($meta)) {
                $meta = new Meta();
                $meta->user_id = $user->id;
            }
            $meta->total = $request->get('total');
            $meta->fecha = $request->get('fecha');
            $meta->save();
        }

        return redirect()->route('admin.users.index')->with(['success' => 'Usuario editado correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
