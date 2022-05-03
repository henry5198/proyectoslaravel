<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto CRUD</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }
        });
        function guardar(){
           
            let modelo = $("#modelo").val();
            let placa = $("#placa").val();

            if($("#btnaceptar").val()=="Guardar"){
                console.log("a guardar");
                $.ajax({
                    type: "POST",
                    url: "{{ url('crear') }}",
                    data: {modelo: modelo, placa:placa},
                    dataType: 'json',
                    success: function(res){
                        console.log(res.datos.id);
                        $("table>tbody").append(`<tr id="`+res.datos.id+`">
                            <td>`+res.datos.id+`</td>
                            <td>`+modelo+`</td>
                            <td>`+placa+`</td>
                            <td>
                                <input type="submit" id="btneditar" value="Editar"  onclick="editar(`+res.datos.id+`)">
                                <input type="submit"  value="Eliminar"  onclick="eliminar(`+res.datos.id+`)">
                            </td>
                        </tr>`)
                    }
                });
            }else{
                console.log("a editar");
                let id = $("#ides").val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('editar') }}",
                    data: {id: id, modelo: modelo, placa: placa},
                    dataType: 'json',
                    success: function(res){
                        $("#"+id+">#tmodelo").html(modelo);
                        $("#"+id+">#tplaca").html(placa);
                        $("#modelo").val("");
                        $("#placa").val("");
                        $("#ides").val("");
                        $("#btnaceptar").val("Guardar");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                    console.log("The following error occured: "+ textStatus +" "+ errorThrown);
                });
            }
            
        }

        function eliminar(id){
           $.ajax({
               type: "POST",
               url: "{{ url('eliminar') }}",
               data: {id: id},
               dataType: 'json',
               success: function(res){
                   $("#"+id+"").remove();
               }
           }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                console.log("The following error occured: "+ textStatus +" "+ errorThrown);
            });
       }

       function editar(id){
           let modelo = $("#"+id+">#tmodelo").html();
           let placa = $("#"+id+">#tplaca").html();
            
            $("#modelo").val(modelo);
            $("#placa").val(placa);
            $("#ides").val(id);
            $("#btnaceptar").val("Editar");
       }       
    </script>
</head>
<body>
    <div class="container">
        <div class="autos">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Placa</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody> @foreach ($autos as $auto)
                    <tr id="{{$auto->id}}">
                        <td>{{$auto->id}}</td>
                        <td id="tmodelo">{{$auto->modelo}}</td>
                        <td id="tplaca">{{$auto->placa}}</td>
                        <td>
                            <input type="submit" id="btneditar" value="Editar"  onclick="editar({{$auto->id}})">
                            <input type="submit" id="btneliminar" value="Eliminar"  onclick="eliminar({{$auto->id}})">
                        </td>
                    </tr> @endforeach
                </tbody>
            </table>
        </div>

        <div class="nuevo">
            <div class="divmodelo">
                <label for="modelo"></label>
                <input type="text" name="modelo" id="modelo">
                <input type="hidden" name="ides" id="ides" value="">
            </div>
            <div class="divplaca">
                <label for="placa"></label>
                <input type="text" name="placa" id="placa">
            </div>
            <input type="submit" id="btnaceptar" value="Guardar" onclick="guardar()">
        </div>
    </div>
</body>
</html>