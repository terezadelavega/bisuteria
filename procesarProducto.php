<?php
// procesarProducto.php
require_once 'modelos/Conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $conn = new Conn();
    $conexion = $conn->conectar();

    $sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad_stock) 
            VALUES (:nombre, :descripcion, :precio, :cantidad)";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':cantidad', $cantidad);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar el producto.";
    }

    $conn->cerrar();
}
?>
