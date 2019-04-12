<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
                    if (data != '[]') {
                        dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    }
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                },
                complete: function(){
                    $(document).trigger( "barriosLoaded");
                }
            });
        });
    });
</script>