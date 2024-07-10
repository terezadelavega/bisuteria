<?php
require_once 'Conn.php';

class Producto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function crearProducto($nombre, $descripcion, $precio, $cantidad_stock) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad_stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $precio, $cantidad_stock]);
    }

    public function obtenerProducto($id) {
        $sql = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $cantidad_stock) {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad_stock = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $precio, $cantidad_stock, $id]);
    }

    public function eliminarProducto($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
