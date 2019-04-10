@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ciudadano</div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['public.ciudadanos.store'], 'method' => 'post']) !!}
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                {!! Form::text('nombres', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_2">Teléfono 2</label>
                                {!! Form::text('telefono_2', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="telefono_3">Teléfono 3</label>
                                {!! Form::text('telefono_3', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                {!! Form::select('departamento_id', $departamentos->prepend('Elija una opción'), null, ['class' => 'form-control', 'id' => 'departamento', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <select id="municipio" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                <select id="comuna" class="form-control" required></select>
                                {{--{!! Form::select('comuna_id', $comunas, null, ['class' => 'form-control', 'id' => 'comuna', 'required' => true]) !!}--}}
                            </div>
                            <div class="form-group">
                                <label for="barrio">Barrio</label>
                                <select id="barrio" class="form-control" required></select>
                                {{--{!! Form::select('barrio_id', $barrios, null, ['class' => 'form-control', 'id' => 'barrios', 'required' => true]) !!}--}}
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <select id="puesto" class="form-control" required></select>
                                {{--{!! Form::select('puesto_id', $puestos, null, ['class' => 'form-control', 'id' => 'puestos', 'required' => true]) !!}--}}
                            </div>
                            <div class="form-group">
                                <label for="mesa">Mesas</label>
                                <select id="mesa" class="form-control" required></select>
                                {{--{!! Form::select('mesa_id', $mesas, null, ['class' => 'form-control', 'id' => 'mesas', 'required' => true]) !!}--}}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label for="activo">Activo</label>
                                {!! Form::select('activo', [1 => 'Si', 0 => 'No'], null, ['class' => 'form-control', 'id' => 'mesas', 'required' => true]) !!}
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
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#departamento').on('change', function(){
            $('#ajax').empty();
            let dropDown = $("#municipio");
            let id = $(this).val();
            $("#municipio").empty();
            $("#comuna").empty();
            $("#barrio").empty();
            $("#puesto").empty();
            $("#mesa").empty();
            $.ajax({
                type: "POST",
                data: {'id': id},
                url: "/ajax/municipios",
                success: function(data){
                    dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                }
            });
        });

        $('#municipio').on('change', function(){
            $('#ajax').empty();
            let dropDown = $("#comuna");
            let id = $(this).val();
            $("#comuna").empty();
            $("#barrio").empty();
            $("#puesto").empty();
            $("#mesa").empty();
            $.ajax({
                type: "POST",
                data: {'id': id},
                url: "/ajax/comunas",
                success: function(data){
                    dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                }
            });
        });

        $('#comuna').on('change', function(){
            $('#ajax').empty();
            let dropDown = $("#barrio");
            let id = $(this).val();
            $("#barrio").empty();
            $("#puesto").empty();
            $("#mesa").empty();
            $.ajax({
                type: "POST",
                data: {'id': id},
                url: "/ajax/barrios",
                success: function(data){
                    dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                }
            });
        });

        $('#barrio').on('change', function(){
            $('#ajax').empty();
            let dropDown = $("#puesto");
            let id = $(this).val();
            $("#puesto").empty();
            $("#mesa").empty();
            $.ajax({
                type: "POST",
                data: {'id': id},
                url: "/ajax/puestos",
                success: function(data){
                    dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                }
            });
        });

        $('#puesto').on('change', function(){
            $('#ajax').empty();
            let dropDown = $("#mesa");
            let id = $(this).val();
            $("#mesa").empty();
            $.ajax({
                type: "POST",
                data: {'id': id},
                url: "/ajax/mesas",
                success: function(data){
                    dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection