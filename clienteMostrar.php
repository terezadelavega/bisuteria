<?php
session_start();
if(!isset($_SESSION["id_cliente"])){
    header("location: login.php");
    exit();
}
require_once "controladores/clienteController.php";
$cc = new clienteController();
$clientes = $cc->mostrar();
echo "<h1>Bienvenid@: ".$_SESSION["correo"]."</h1>";
?>

<table class="table">
    <tr>
        <th>nombre</th>
        <th>apellido</th>
        <th>correo</th>
        <th>telefono</th>
        <th>direccion</th>
    </tr>
    <?php
    foreach($clientes as $cliente){
        echo "<tr>
            <td>".$cliente["nombre"]."</td>
            <td>".$cliente["apellido"]."</td>
            <td>".$cliente["correo"]."</td>
            <td>".$cliente["telefono"]."</td>
            <td>".$cliente["direccion"]."</td>
        </tr>";
    }
    ?>
</table>

<?php
// clienteMostrar.php
require_once 'Conn.php';

$conn = new Conn();
$conexion = $conn->conectar();

$sql = "SELECT * FROM productos";
$stmt = $conexion->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn->cerrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['cantidad_stock']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
