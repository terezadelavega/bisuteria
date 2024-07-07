<?php
require_once "modelos/Usuario.php";

class usuarioController{
    public function mostrar(){
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function login($username, $contrasena){
        $usuario = new Usuario();
        $usuarioValidado = $usuario->login($username);

        $contador = 0;
        $usuario_id = null;
        $usuario_nombre = null;
        $contrasena_bd = null;
        foreach($usuarioValidado as $item){
            $usuario_id = $item["id"];
            $usuario_nombre = $item["nombres"]." ".$item["apellidos"];
            $contrasena_bd = $item["contra"];
            $tipo = $item["tipo"];
            $contador++;
        }

        if($contador>0){
            if($contrasena == $contrasena_bd){
                session_start();
                $_SESSION["id"] = $usuario_id;
                $_SESSION["usuario"] = $usuario_nombre;
                $_SESSION["tipo"] = $tipo;
                header("Location: usuarioMostrar.php");
                echo "usuario validado";
            }else{
                echo "usuario y/o contraseña no validos";
            }
        }else{
            echo "usuario y/o contraseña no validos";
        }
    }

    public function guardar(String $username, String $contrasena, String $nombres, String $apellidos, String $email, String $tipo, String $direccion){
        $usuario = new Usuario();
        return $usuario->guardar($username, $contrasena, $nombres, $apellidos, $email, $tipo, $direccion);
        }
}