<?php
require_once "controladores/facturaController.php";

// Asegúrate de que el array 'cart' está presente en $_POST
if (isset($_POST['cart'])) {
    $fc = new facturaController();
    $factura = $fc->generarFactura($_POST['cart']);
} else {
    $factura = ['productos' => [], 'total' => 0];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .factura-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .factura-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .factura-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .factura-container table, .factura-container th, .factura-container td {
            border: 1px solid #ddd;
        }
        .factura-container th, .factura-container td {
            padding: 10px;
            text-align: left;
        }
        .factura-container th {
            background-color: #f2f2f2;
        }
        .factura-container p {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="factura-container">
        <h2>Factura de Compra</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($factura['productos'] as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                        <td><?= htmlspecialchars($producto['precio']) ?></td>
                        <td><?= htmlspecialchars($producto['subtotal']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total: <?= number_format($factura['total'], 2) ?></p>
    </div>
</body>
</html>
