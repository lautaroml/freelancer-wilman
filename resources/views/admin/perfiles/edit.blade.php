@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil</div>
                    <div class="card-body">
                        {!! Form::model($perfil, ['route' => ['admin.perfiles.update', $perfil->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
