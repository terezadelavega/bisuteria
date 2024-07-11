<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
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
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: calc(100% - 16px);
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Producto</h1>
        <form method="post" action="productoMostrar.php">
            <input type="text" name="nombre" placeholder="Nombre del producto" required><br>
            <input type="text" name="descripcion" placeholder="Descripción del producto" required><br>
            <input type="number" step="0.01" name="precio" placeholder="Precio del producto" required><br>
            <input type="number" name="stock" placeholder="Cantidad en stock" required><br>
            <input type="submit" value="REGISTRAR">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = trim($_POST["nombre"]);
            $descripcion = trim($_POST["descripcion"]);
            $precio = trim($_POST["precio"]);
            $stock = trim($_POST["stock"]);

            $contadorProducto = 0;

            if (empty($nombre)) {
                echo "El campo nombre es obligatorio<br>";
                $contadorProducto++;
            }

            if (empty($descripcion)) {
                echo "El campo descripcion es obligatorio<br>";
                $contadorProducto++;
            }

            if (empty($precio)) {
                echo "El campo precio es obligatorio<br>";
                $contadorProducto++;
            }

            if (empty($stock)) {
                echo "El campo cantidad es obligatorio<br>";
                $contadorProducto++;
            }

            if ($contadorProducto == 0) {
                require_once "controladores/productoController.php";
                $pc = new ProductoController();
                $respuesta = $pc->guardar($nombre, $descripcion, $precio, $stock);
                if ($respuesta > 0) {
                    echo "";
                } else {
                    echo "ERROR: el producto no se ha registrado";
                }
            }
        }
        ?>
    </div>
</body>
</html>
