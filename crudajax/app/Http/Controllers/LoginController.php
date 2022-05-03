<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Custom\Login;


class LoginController extends Controller
{

    public function index()
    {
        return view('loginajax');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logear()
    {
        try {
            $login = new Login("henry", "123");
            // Nos llegan los datos por POST 
            if ($_POST['nom'] == $login->getNameUser() && $_POST['pass'] == $login->getPassword()) {
                // Devolvemos que todo es correcto escribiendo por salida 
                echo "Usuario correcto";
            } else {
                // Mensaje si no cumple la validación de usuario y password 
                echo "Usuario no existente";
            }
        } catch (\Throwable $th) {
            print($th);
        }
    }

    public function indexb()
    {
        return view('boton');
    }

    public $cont = 0;
    public function cambiar()
    {
        try {
            
            $contenido = $_POST['contenido'];
            error_log($contenido);
            if($contenido=="Mensaje cambia con ajax"){
                $msj = "nuevo texto";
            }else{
                $msj = "Mensaje cambia con ajax";
            }
            
            
            return response()->json(array('msj' => $msj), 200);
        } catch (\Throwable $th) {
            error_log($th);
        }
    }
}
