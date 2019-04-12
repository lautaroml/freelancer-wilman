@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Configuración</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Fecha de finalización</th>
                                    <th>Meta global</th>
                                    <th>Herramientas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>{{ $setting->fecha }}</td>
                                    <td>{{ $setting->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @if(! $settings->count())
                            <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">Cargar</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
