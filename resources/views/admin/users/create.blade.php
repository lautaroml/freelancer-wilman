@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['admin.users.store'], 'method' => 'post']) !!}
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="perfil">Perfil</label>
                                {!! Form::select('perfil_id', $perfiles, null, ['class' => 'form-control', 'id' => 'perfil']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
