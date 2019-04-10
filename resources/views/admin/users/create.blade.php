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
                        {!! Form::open(['route' => ['admin.users.store'], 'method' => 'post']) !!}
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <label for="perfil">Perfil</label>
                                {!! Form::select('perfil_id', $perfiles, null, ['class' => 'form-control', 'id' => 'perfil', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="name">Meta</label>
                                {!! Form::number('total', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de la meta</label>
                                <input name="fecha" class="datepicker form-control" data-date-format="dd/mm/yyyy" required>
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
            autoclose: true
        });
    </script>
@endsection
