<?php
require_once 'modelos/Conn.php';
require_once 'modelos/Producto.php';

$conn = new Conn();
$conexion = $conn->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Manejar la solicitud POST para actualizar el producto
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id_producto = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

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
    } else {
        echo "ID del producto no proporcionado.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Manejar la solicitud GET para obtener los datos del producto
    $id_producto = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id_producto);
    $stmt->execute();
    $producto = $stmt->fetch();

    if ($producto) {
        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad_stock'];
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID del producto no proporcionado o método de solicitud incorrecto.";
    exit;
}

$conn->cerrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
</head>
<body>
    <h1>Actualizar Producto</h1>
    <form action="actualizarProducto.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($id_producto) ? $id_producto : ''; ?>" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value="<?php echo isset($descripcion) ? $descripcion : ''; ?>" required>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" value="<?php echo isset($precio) ? $precio : ''; ?>" required>
        <label for="cantidad">Cantidad en stock:</label>
        <input type="number" name="cantidad" id="cantidad" value="<?php echo isset($cantidad) ? $cantidad : ''; ?>" required>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
