<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo AJAX con jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Llamada librería jQuery-->
        <!--<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>-->
        <meta name="csrf-token" content="{{ csrf_token() }}">         
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>         
    </head>
    <body>
        <strong>Validar usuario</strong>
        <form action="javascript:void(0)" id="validador" method="POST">
            <label for="nom">Nombre</label>
            <input id="nom" type="text" name="nom" placeholder="Inserte su nombre" />
            
            <label for="pass">Password</label>
            <input id="pass" type="password" name="pass" /> 
            
            <!-- Botón que hace la llamada a la función validarUsuario() para enviar formulario -->
            <input  type="submit" id="btnv" value="Validar usuario" /> 
            
            <!-- Consola dónde mostramos mensajes devueltos -->
            <div id="consola">Bienvenido</div>                   
        </form>

        <script type="text/javascript">
            $(document).ready(function($){ 
                $.ajaxSetup({ 
                    headers: { 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    } 
                }); 
                
                // Función que envía y recibe respuesta con AJAX
                
                $('body').on('click', '#btnv', function () {
                    var pnom= $('#nom').val(); // Cogemos del formulario el valor nom
                    ppass= $('#pass').val(); // Cogemos del formulario el valor pass
                    console.log(pnom)
                    //console.log(ppass)
                    $.ajax({
                    type: "POST",  // Envío con método POST
                    //url: './consulta.php',  // Fichero destino (el PHP que trata los datos)
                    url: "{{ url('logeando') }}", 
                    data: { nom: pnom, pass: ppass } // Datos que se envían
                }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
                    $("#consola").html(msg);  // Escribimos en el div consola el mensaje devuelto
                }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                    // Mostramos en consola el mensaje con el error que se ha producido
                    $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown); 
                });
                });
                
            });
        </script>
    </body>
</html>