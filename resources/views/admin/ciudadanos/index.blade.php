@extends('layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">

                                <h5 class="mb-0">
                                    Registro de ciudadanos
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Filtrar
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="documento" class="form-control" placeholder="Documento" value="{{ request('documento') }}">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="{{ request('nombres') }}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Departamento</small>
                                                    {!! Form::select('departamento_id', $departamentos->prepend('Elija una opción'), request('departamento_id'), ['class' => 'form-control', 'id' => 'departamento']) !!}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Municipio</small>
                                                    <select name="municipio_id" id="municipio" class="form-control"></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                        <small class="form-text text-muted">Comuna</small>
                                                    <select name="comuna_id" id="comuna" class="form-control" ></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                        <small class="form-text text-muted">Barrio</small>
                                                    <select name="barrio_id" id="barrio" class="form-control" ></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <small class="form-text text-muted">Puesto</small>
                                                    <select name="puesto_id" id="puesto" class="form-control" ></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                        <small class="form-text text-muted">Mesa</small>
                                                    <select name="mesa_id" id="mesa" class="form-control" ></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                        <small class="form-text text-muted">Usuario</small>
                                                    {!! Form::select('user_id', $users->prepend('Elija una opción'), request('user_id'), ['class' => 'form-control', 'id' => 'user']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Usuario activo
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" @if(request('activo')==='1')checked @endif type="radio" name="activo" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" @if(request('activo')==='0')checked @endif type="radio" name="activo" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">NO</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" @if(request('activo')==='2' || is_null(request('activo')))checked @endif type="radio" name="activo" id="inlineRadio3" value="">
                                                    <label class="form-check-label" for="inlineRadio3">TODOS</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Filtrar</button>
                                        <button id="reset-button" type="submit" class="btn btn-warning">Borrar Filtros</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>
                        <table class="table table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Documento</th>
                                    <th>Teléfono</th>
                                    <th>Teléfono2</th>
                                    <th>Teléfono3</th>
                                    <th>Dirección</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Comuna</th>
                                    <th>Barrio</th>
                                    <th>Puesto</th>
                                    <th>Mesa</th>
                                    <th>Email</th>
                                    <th>Activo</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ciudadanos as $ciudadano)
                                <tr>
                                    <td>{{ $ciudadano->nombres }}</td>
                                    <td>{{ $ciudadano->documento }}</td>
                                    <td>{{ $ciudadano->telefono }}</td>
                                    <td>{{ $ciudadano->telefono_2 }}</td>
                                    <td>{{ $ciudadano->telefono_3 }}</td>
                                    <td>{{ $ciudadano->direccion }}</td>
                                    <td>{{ $ciudadano->departamento->nombre }}</td>
                                    <td>{{ $ciudadano->municipio->nombre }}</td>
                                    <td>{{ $ciudadano->comuna->nombre }}</td>
                                    <td>{{ @$ciudadano->barrio->nombre }}</td>
                                    <td>{{ @$ciudadano->puesto->nombre }}</td>
                                    <td>{{ @$ciudadano->mesa->nombre }}</td>
                                    <td>{{ $ciudadano->email }}</td>
                                    <td>{{ $ciudadano->isActive() }}</td>

                                    <td>
                                        <a href="{{ route('public.ciudadanos.edit', $ciudadano->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $ciudadanos->appends([
                            'documento' => request('documento'),
                            'nombres' => request('nombres'),
                            'departamento_id' => request('departamento_id'),
                            'municipio_id' => request('municipio_id'),
                            'comuna_id' => request('comuna_id'),
                            'barrio_id' => request('barrio_id'),
                            'puesto_id' => request('puesto_id'),
                            'mesa_id' => request('mesa_id'),
                            'user_id' => request('user_id'),
                            'activo' => request('activo'),
                        ])->links() }}
                        <a href="{{ route('public.ciudadanos.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({
                width: '100%',
                "language": {
                    "noResults": function(){
                        return "No se han encontrado resultados";
                    }
                },
            });
        });
    </script>
    <script>
        $( document ).on( "municipiosLoaded", function() {
            $('#municipio').val('{{ request('municipio_id') }}').trigger('change');
        });
        $( document ).on( "comunasLoaded", function() {
            $('#comuna').val('{{ request('comuna_id') }}').trigger('change');
        });
        $( document ).on( "barriosLoaded", function() {
            $('#barrio').val('{{ request('barrio_id') }}').trigger('change');
        });
        $( document ).on( "puestosLoaded", function() {
            $('#puesto').val('{{ request('puesto_id') }}').trigger('change');
        });
        $( document ).on( "mesasLoaded", function() {
            $('#mesa').val('{{ request('mesa_id') }}').trigger('change');
        });
    </script>
    @include('share.departamentos')
    @include('share.municipios')
    @include('share.comunas')
    @include('share.barrios')
    @include('share.puestos')
    <script>
        document.getElementById("reset-button").addEventListener("click", function(event){
            event.preventDefault();
            window.location.replace('{{ route('admin.ciudadanos.index') }}');
        });
    </script>
    @if(request('departamento_id'))
        <script>
            $(document).ready(function(){
                $('#departamento').val('{{ request('departamento_id') }}').trigger('change');
            });
        </script>
    @endif
@endsection
