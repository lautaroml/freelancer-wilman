@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Barrio</div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['admin.barrios.store'], 'method' => 'post']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                {!! Form::select('comuna_id', $comunas, null, ['class' => 'form-control', 'id' => 'comuna', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                {!! Form::select('municipio_id', $municipios, null, ['class' => 'form-control', 'id' => 'municipio', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'id' => 'departamento', 'required' => true]) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
