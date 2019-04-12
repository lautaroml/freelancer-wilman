<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
                    if (data != '[]') {
                        dropDown.append('<option value="">' + 'Elija una opción' + '</option>');
                    }
                    $.each($.parseJSON(data), function(i, d) {
                        dropDown.append('<option value="' + i + '">' + d + '</option>');
                    });
                },
                complete: function(){
                    $(document).trigger( "mesasLoaded");
                }
            });
        });
    });
</script>