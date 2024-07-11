<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
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
        input[type="password"],
        select,
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
        <h1>Registrar Usuario</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="text" name="username" placeholder="Ingrese username" required><br>
            <input type="password" name="contrasena" placeholder="Ingrese contraseña" required><br>
            <input type="text" name="nombres" placeholder="Ingrese nombres" required><br>
            <input type="text" name="apellidos" placeholder="Ingrese apellidos" required><br>
            <input type="email" name="email" placeholder="Ingrese correo electrónico" required><br>
            <select name="tipo" required>
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
                <option value="Usuario">Usuario</option>
            </select><br>
            <input type="text" name="direccion" placeholder="Ingrese dirección" required><br>
            <input type="submit" value="Guardar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $contrasena = trim($_POST["contrasena"]);
            $nombres = trim($_POST["nombres"]);
            $apellidos = trim($_POST["apellidos"]);
            $email = trim($_POST["email"]);
            $tipo = trim($_POST["tipo"]);
            $direccion = trim($_POST["direccion"]);

            $contadorErrores = 0;

            if (empty($username)) {
                echo "El campo username es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($contrasena)) {
                echo "El campo contraseña es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($nombres)) {
                echo "El campo nombres es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($apellidos)) {
                echo "El campo apellidos es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($email)) {
                echo "El campo email es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($tipo)) {
                echo "El campo tipo es obligatorio<br>";
                $contadorErrores++;
            }

            if (empty($direccion)) {
                echo "El campo dirección es obligatorio<br>";
                $contadorErrores++;
            }

            if ($contadorErrores == 0) {
                require_once "controladores/usuarioController.php";
                $uc = new UsuarioController();
                $respuesta = $uc->guardar($username, $contrasena, $nombres, $apellidos, $email, $tipo, $direccion);
                if ($respuesta > 0) {
                    echo "Se ha registrado correctamente";
                } else {
                    echo "ERROR: no se ha registrado";
                }
            }
        }
        ?>
    </div>
</body>
</html>
