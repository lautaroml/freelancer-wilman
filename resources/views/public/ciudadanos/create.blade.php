@extends('layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                    <div class="card-header">Ciudadano</div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['public.ciudadanos.store'], 'method' => 'post']) !!}
                            <div class="form-group">
                                <label for="documento">Documento</label>
                                {!! Form::text('documento', null, ['class' => 'form-control', 'required' => true, 'id' => 'documento']) !!}
                                <small id="documentHelp" class="form-text text-muted" style="display: none; color: red !important;">Ya existe un ciudadano con ese Documento.</small>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                {!! Form::text('nombres', null, ['class' => 'form-control canBeDisabled', 'required' => true, 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                {!! Form::text('telefono', null, ['class' => 'form-control canBeDisabled', 'required' => true, 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_2">Teléfono 2</label>
                                {!! Form::text('telefono_2', null, ['class' => 'form-control canBeDisabled', 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_3">Teléfono 3</label>
                                {!! Form::text('telefono_3', null, ['class' => 'form-control canBeDisabled', 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                {!! Form::text('direccion', null, ['class' => 'form-control canBeDisabled', 'required' => true, 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                {!! Form::select('departamento_id', $departamentos->prepend('Elija una opción'), null, ['class' => 'form-control canBeDisabled', 'id' => 'departamento', 'required' => true, 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <select name="municipio_id" id="municipio" class="form-control canBeDisabled" required disabled></select>
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                <select name="comuna_id" id="comuna" class="form-control canBeDisabled" disabled></select>
                            </div>
                            <div class="form-group">
                                <label for="barrio">Barrio</label>
                                <select name="barrio_id" id="barrio" class="form-control canBeDisabled" disabled></select>
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <select name="puesto_id" id="puesto" class="form-control canBeDisabled" disabled></select>
                            </div>
                            <div class="form-group">
                                <label for="mesa">Mesas</label>
                                <select name="mesa_id" id="mesa" class="form-control canBeDisabled" disabled></select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control canBeDisabled', 'disabled' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="activo">Activo</label>
                                {!! Form::select('activo', [1 => 'Si', 0 => 'No'], null, ['class' => 'form-control canBeDisabled', 'id' => 'mesas', 'required' => true, 'disabled' => true]) !!}
                            </div>
                            <button id="submit-button" type="submit" class="btn btn-primary">Confirmar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({
                width: '100%',
                "language": {
                    "noResults": function(){
                        return "No se han encontrado resultados";
                    }
                },
            });
        });
    </script>
    <script>
        $( document ).on( "municipiosLoaded", function() {
            $('#municipio').val('{{ old('municipio_id') }}').trigger('change');
        });
        $( document ).on( "comunasLoaded", function() {
            $('#comuna').val('{{ old('comuna_id') }}').trigger('change');
        });
        $( document ).on( "barriosLoaded", function() {
            $('#barrio').val('{{ old('barrio_id') }}').trigger('change');
        });
        $( document ).on( "puestosLoaded", function() {
            $('#puesto').val('{{ old('puesto_id') }}').trigger('change');
        });
        $( document ).on( "mesasLoaded", function() {
            $('#mesa').val('{{ old('mesa_id') }}').trigger('change');
        });
    </script>
    @include('share.departamentos')
    @include('share.municipios')
    @include('share.comunas')
    @include('share.barrios')
    @include('share.puestos')
    @if(old('departamento_id'))
        <script>
            $(document).ready(function(){
                $('#departamento').val('{{ old('departamento_id') }}').trigger('change');
            });
        </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function(){
            $('#documento').on("keyup input", function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                /* Get input value on change */
                let inputVal = $(this).val();
                if(inputVal.length){
                    $('#ajax').empty();
                    $.ajax({
                        type: "POST",
                        url: "/foo",
                        data: {val: inputVal},
                        success: function(data){
                            validate(data);
                        }
                    });
                } else{
                    $('#documentHelp').hide();
                    $('#documento').removeClass('is-invalid');
                    $('#submit-button').show();
                    $(".canBeDisabled").prop('disabled', false);
                }
            });
        });
        
        function validate(response) {
            if (response.status == 'error') {
                $('#documentHelp').show();
                $('#documento').addClass('is-invalid');
                $('#submit-button').hide();
                $(".canBeDisabled").prop('disabled', true);
            } else {
                $('#documentHelp').hide();
                $('#documento').removeClass('is-invalid');
                $('#documento').addClass('is-valid');
                $('#submit-button').show();
                $(".canBeDisabled").prop('disabled', false);
            }
        }
    </script>
@endsection