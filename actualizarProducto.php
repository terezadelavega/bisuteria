<?php
// actualizarProducto.php
require_once 'modelos/Conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    
    $conn = new Conn();
    $conexion = $conn->conectar();

    $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, 
            precio = :precio, cantidad_stock = :cantidad WHERE id = :id";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':id', $id_producto);

    if ($stmt->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto.";
    }

    $conn->cerrar();
}
?>
