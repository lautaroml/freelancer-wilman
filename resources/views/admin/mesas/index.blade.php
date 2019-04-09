@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mesas</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Comuna</th>
                                    <th>Barrio</th>
                                    <th>Puesto</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($mesas as $mesa)
                                <tr>
                                    <td>{{ $mesa->nombre }}</td>
                                    <td>{{ $mesa->comuna->nombre }}</td>
                                    <td>{{ $mesa->barrio->nombre }}</td>
                                    <td>{{ $mesa->puesto->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.mesas.edit', $mesa->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $mesas->links() }}
                        <a href="{{ route('admin.mesas.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
