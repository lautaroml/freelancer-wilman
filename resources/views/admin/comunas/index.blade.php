@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comunas</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($comunas as $comuna)
                                <tr>
                                    <td>{{ $comuna->nombre }}</td>
                                    <td>{{ $comuna->departamento->nombre }}</td>
                                    <td>{{ $comuna->municipio->nombre }}</td>
                                    <td>{{ $comuna->comuna_lat }}</td>
                                    <td>{{ $comuna->comuna_long }}</td>
                                    <td>
                                        <a href="{{ route('admin.comunas.edit', $comuna->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $comunas->links() }}
                        <a href="{{ route('admin.comunas.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
