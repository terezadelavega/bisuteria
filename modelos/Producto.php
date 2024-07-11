<?php
require_once 'Conn.php';

class Producto {
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;

    public function __construct() {
        $this->conn = new Conn();
    }

    public function guardar($nombre, $descripcion, $precio, $stock) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO producto (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);
        $resultado = $stmt->execute();
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    public function eliminarProducto($id) {
        $conexion = $this->conn->conectar();
        $sql = "DELETE FROM producto WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $resultado = $stmt->execute();
        $this->conn->cerrar();
        return $resultado;
    }
}
?>
