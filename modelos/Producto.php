<?php
require_once "Conn.php";

class Producto{
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado
    }
}