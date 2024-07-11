<style>
        h2 {
            text-align: center;
        }
        th {
            background-color: blue;
            color: white; /* Esto es opcional para cambiar el color del texto en las celdas del encabezado */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="username" placeholder="Ingrese username"><br>
    <input type="password" name="contrasena" placeholder="Ingrese contraseña"><br>
    <input type="text" name="nombres" placeholder="Ingrese nombres"><br>
    <input type="text" name="apellidos" placeholder="Ingrese apellidos"><br>
    <input type="text" name="email" placeholder="Ingrese correo electrónico"><br>
    <select name="tipo">
        <option value=""> </option>
        <option value="Administrador">Administrador</option>
        <option value="Empleado">Empleado</option>
        <option value="Usuario">Cliente</option>
    </select><br>
    <input type="text" name="direccion" placeholder="Ingrese dirección"><br>
    <input type="submit" value="Guardar">
</form>

<?php

if(!empty($_POST)){
    $username = trim($_POST["username"]);
    $contrasena = trim($_POST["contrasena"]);
    $nombres = trim($_POST["nombres"]);
    $apellidos = trim($_POST["apellidos"]);
    $email = trim($_POST["email"]);
    $tipo = trim($_POST["tipo"]);
    $direccion = trim($_POST["direccion"]);

    $contadorErrores = 0;

    if($username==""){
        echo "El campo username es Obligatorio<br>";
        $contadorErrores++;
    }

    if($contrasena==""){
        echo "El campo contraseña es Obligatorio<br>";
        $contadorErrores++;
    }

    if($nombres==""){
        echo "El campo nombre es Obligatorio<br>";
        $contadorErrores++;
    }

    if($apellidos==""){
        echo "El campo apellido es Obligatorio<br>";
        $contadorErrores++;
    }

    if($email==""){
        echo "El campo email es Obligatorio<br>";
        $contadorErrores++;
    }

    if($tipo==""){
        echo "El campo tipo es Obligatorio<br>";
        $contadorErrores++;
    }

    if($direccion==""){
        echo "El campo direccion es Obligatorio<br>";
        $contadorErrores++;
    }

    if($contadorErrores==0){
        require_once "controladores/usuarioController.php";
        $uc = new UsuarioController();
        $respuesta = $uc->guardar($username, $contrasena, $nombres, $apellidos, $email, $tipo, $direccion);
        if($respuesta > 0){
            echo "Se ha registrado correctamente";
        }else{
            echo "ERROR: no se ha registrado";
        }
    }

    
}