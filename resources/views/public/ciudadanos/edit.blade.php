@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ciudadano</div>
                    <div class="card-body">
                        {!! Form::model($ciudadano, ['route' => ['public.ciudadanos.update', $ciudadano->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                {!! Form::text('nombres', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_2">Teléfono 2</label>
                                {!! Form::text('telefono_2', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_3">Teléfono 3</label>
                                {!! Form::text('telefono_3', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'id' => 'departamento', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                {!! Form::select('municipio_id', $municipios, null, ['class' => 'form-control', 'id' => 'municipio', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                {!! Form::select('comuna_id', $comunas, null, ['class' => 'form-control', 'id' => 'comuna', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="barrio">Barrio</label>
                                {!! Form::select('barrio_id', $barrios, null, ['class' => 'form-control', 'id' => 'barrios', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                {!! Form::select('puesto_id', $puestos, null, ['class' => 'form-control', 'id' => 'puestos', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="mesa">Mesas</label>
                                {!! Form::select('mesa_id', $mesas, null, ['class' => 'form-control', 'id' => 'mesas', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="activo">Activo</label>
                                {!! Form::select('activo', [1 => 'Si', 0 => 'No'], null, ['class' => 'form-control', 'id' => 'mesas', 'required' => true]) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
