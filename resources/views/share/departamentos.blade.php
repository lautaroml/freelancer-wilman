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
    });
</script>