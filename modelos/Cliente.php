<?php

require_once "Conn.php";

class Cliente{
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $direccion;
    private $contrasena;

    public function __construct(){
    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function login($correo){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE correo = '$correo'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}