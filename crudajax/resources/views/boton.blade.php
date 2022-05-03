<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boton</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">         
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        function cambiamsj(){
            $.ajaxSetup({ 
                headers: { 
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                } 
            }); 
            
            $.ajax({
                type: "POST",
                url: "{{ url('cambio') }}",
                data: {contenido:$("#msj").html()},
                success:function(data){
                    console.log($("#msj").html());
                    $("#msj").html(data.msj);
                }
            });
        }
    </script>
</head>
<body>
    <div id="msj">Mensaje cambia con ajax</div>
    <input type="button" onclick="cambiamsj()" value="Click">
</body>
</html>