<?php
// procesarProducto.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'modelos/Conn.php';
    require_once 'modelos/Producto.php';

    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';

    // Validación básica de los datos recibidos (opcional)
    if (empty($nombre) || empty($descripcion) || empty($precio) || empty($cantidad)) {
        echo "Por favor, completa todos los campos.";
        exit; // Detiene la ejecución si faltan datos
    }

    try {
        $conn = new Conn();
        $conexion = $conn->conectar();

        // Preparar la consulta SQL para insertar un nuevo producto
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
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud incorrecto.";
}
?>
