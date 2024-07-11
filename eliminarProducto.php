<?php
    require_once 'modelos/Producto.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $producto = new Producto();
        $id = intval($_GET['id']);
        $resultado = $producto->eliminarProducto($id);

        if ($resultado) {
            echo "Producto eliminado exitosamente";
        } else {
            echo "Error al eliminar el producto";
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="number"] {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: calc(100% - 16px);
        }
        button[type="submit"] {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        button[type="submit"]:hover {
            background-color: #d32f2f;
        }
        .delete-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Eliminar Producto</h1>
        <form action="eliminarProducto.php" method="get">
            <label for="id">ID del Producto:</label>
            <input type="number" name="id" id="id" required>
            <button type="submit">
                <span class="delete-icon"><i class="fas fa-trash-alt"></i></span>
                Eliminar Producto
            </button>
        </form>
    </div>
</body>
</html>
