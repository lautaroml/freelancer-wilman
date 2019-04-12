@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuario</div>
                    <div class="card-body">
                        {!! Form::model($setting, ['route' => ['admin.settings.update', $setting->id], 'method' => 'put']) !!}
                        <div class="form-group">
                            <label for="name">Fecha de finalización</label>
                            {!! Form::text('fecha', null, ['class' => 'datepicker form-control', 'data-date-format' => 'dd/mm/yyyy']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Meta global</label>
                            {!! Form::text('total', null, ['class' => 'form-control', 'required' => true]) !!}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            startDate: '-3d',
            autoclose: true,
            update: '19/03/1986'
        });
    </script>
@endsection