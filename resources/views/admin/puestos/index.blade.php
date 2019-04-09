@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Puestos</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Barrio</th>
                                    <th>Comuna</th>
                                    <th>Municipio</th>
                                    <th>Departamento</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($puestos as $puesto)
                                <tr>
                                    <td>{{ $puesto->nombre }}</td>
                                    <td>{{ $puesto->barrio->nombre }}</td>
                                    <td>{{ $puesto->comuna->nombre }}</td>
                                    <td>{{ $puesto->municipio->nombre }}</td>
                                    <td>{{ $puesto->departamento->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.puestos.edit', $puesto->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $puestos->links() }}
                        <a href="{{ route('admin.puestos.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
