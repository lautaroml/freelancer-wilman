@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Barrios</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Comuna</th>
                                    <th>Municipio</th>
                                    <th>Departamento</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($barrios as $barrio)
                                <tr>
                                    <td>{{ $barrio->nombre }}</td>
                                    <td>{{ $barrio->comuna->nombre }}</td>
                                    <td>{{ $barrio->municipio->nombre }}</td>
                                    <td>{{ $barrio->departamento->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.barrios.edit', $barrio->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $barrios->links() }}
                        <a href="{{ route('admin.barrios.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
