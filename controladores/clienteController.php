<?php

require_once('../modelos/Cliente.php');

class clienteController{
    public function mostrar(){
        $cliente = new Cliente();
        return $cliente->mostrar();
    }

    public function login($correo, $contrasena){
        $cliente = new Cliente();
        $clienteValidado = $cliente->login($correo);

        $contador = 0;
        $cliente_id = null;
        $cliente_nombre = null;
        $password_bd = null;
        foreach($clienteValidado as $item){
            $cliente_id = $item["id_cliente"];
            $cliente_nombre = $item["nombre"]." ".$item["apellido"];
            $password_bd = $item["contrasena"];
            $contador++;
        }

        if($contador>0){
            if($contrasena == $password_bd){
                session_start();
                $_SESSION["id_cliente"] = $cliente_id;
                $_SESSION["correo"] = $cliente_nombre;
                header("Location: clienteMostrar.php");
                exit();
            }else{
                echo "correo y/o contraseña no válidos";
            }
        }else{
            echo "correo y/o contraseña no válidos";
        }
    }
}
