@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfiles</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th width="20px">Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($perfiles as $perfil)
                                <tr>
                                    <td>{{ $perfil->id }}</td>
                                    <td>{{ $perfil->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.perfiles.edit', $perfil->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.perfiles.create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
