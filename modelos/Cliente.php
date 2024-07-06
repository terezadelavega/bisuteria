<?php

require_once ('/../Conn.php');

class Cliente{
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $direccion;
    private $contrasena;

    public function __construct(){
        /*$this->username = $username;
        $this->password = $password;
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->tipo = $tipo;
        $this->id_escuela = $id_escuela;
        $this->email = $email; */
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
        $sql = "SELECT * FROM cliente WHERE correo = :correo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conn->cerrar();
        return $resultado;
    }
}
