@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comuna</div>
                    <div class="card-body">
                        {!! Form::model($comuna, ['route' => ['admin.comunas.update', $comuna->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'id' => 'departamento']) !!}
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                {!! Form::select('municipio_id', $municipios, null, ['class' => 'form-control', 'id' => 'municipio']) !!}
                            </div>
                            <div class="form-group">
                                <label for="latitud">Latitud</label>
                                {!! Form::text('comuna_lat', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="longitud">Longitud</label>
                                {!! Form::text('comuna_long', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
