@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mesa</div>
                    <div class="card-body">
                        {!! Form::model($mesa, ['route' => ['admin.mesas.update', $mesa->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                {!! Form::select('comuna_id', $comunas->prepend('Elija una opción'), null, ['class' => 'form-control', 'id' => 'comuna', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="barrio">Barrios</label>
                                {!! Form::select('barrio_id', $barrios, null, ['class' => 'form-control', 'id' => 'barrio', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puestos</label>
                                {!! Form::select('puesto_id', $puestos, null, ['class' => 'form-control', 'id' => 'puesto', 'required' => true]) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('share.comunas')
    @include('share.barrios')
@endsection