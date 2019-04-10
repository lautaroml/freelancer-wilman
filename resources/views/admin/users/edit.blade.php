@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuario</div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="perfil">Perfil</label>
                                {!! Form::select('perfil_id', $perfiles, null, ['class' => 'form-control', 'id' => 'perfil']) !!}
                            </div>
                            <div class="form-group">
                                <label for="name">Meta</label>
                                {!! Form::number('total', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de la meta</label>
                                {!! Form::text('fecha', null, ['class' => 'datepicker form-control', 'data-date-format' => 'dd/mm/yyyy']) !!}
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