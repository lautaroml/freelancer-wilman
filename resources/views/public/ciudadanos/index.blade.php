@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Registro de ciudadanos</div>
                    <div class="card-body">
                        <table class="table table-sm">
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
                                    <td>{{ $ciudadano->barrio->nombre }}</td>
                                    <td>{{ $ciudadano->puesto->nombre }}</td>
                                    <td>{{ $ciudadano->mesa->nombre }}</td>
                                    <td>{{ $ciudadano->email }}</td>
                                    <td>{{ $ciudadano->isActive() }}</td>

                                    <td>
                                        <a href="{{ route('public.ciudadanos.edit', $ciudadano->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $ciudadanos->links() }}
                        <a href="{{ route('public.ciudadanos.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
