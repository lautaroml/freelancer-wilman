@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil</div>
                    <div class="card-body">
                        {!! Form::model($departamento, ['route' => ['admin.departamentos.update', $departamento->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
