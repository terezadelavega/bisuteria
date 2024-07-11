<?php

require_once "Conn.php";

class Usuario{
    private $username;
    private $contra;
    private $apellidos;
    private $nombres;
    private $tipo;
    private $email;

    public function __construct(){
    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function login($username){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE username = '$username'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(String $username, String $contrasena, String $nombres, String $apellidos, String $email, String $tipo, String $direccion){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(username, contrasena, nombres, apellidos, email, tipo, direccion)
        VALUES('$username', '$contrasena','$nombres', '$apellidos', '$email', '$tipo', '$direccion')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
