<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
                },
                complete: function(){
                    $(document).trigger( "puestosLoaded");
                }
            });
        });
    });
</script>