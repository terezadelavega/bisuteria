<?php
// eliminarProducto.php
require_once 'modelos/Conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_producto = $_GET['id'];

 
    $conn = new Conn();
    $conexion = $conn->conectar();

    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id_producto);

    if ($stmt->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto.";
    }

    $conn->cerrar();
}
?>
