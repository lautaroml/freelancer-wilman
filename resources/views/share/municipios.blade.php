<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
    });
</script>