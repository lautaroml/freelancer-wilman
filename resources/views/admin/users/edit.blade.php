@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
