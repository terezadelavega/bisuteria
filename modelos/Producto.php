<?php
require_once "Conn.php";

class Producto{
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;

    public function __construct(){
    }

    public function guardar(String $nombre, String $descripcion, String $precio, int $stock){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO producto(nombre, descripcion, precio, stock)
        VALUES('$nombre', '$descripcion','$precio', $stock)";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}