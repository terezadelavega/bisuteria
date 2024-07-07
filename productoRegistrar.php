<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="nombre" placeboard="nombre del producto"><br>
    <input type="text" name="descripcion" placeboard="descripcion del producto"><br>
    <input type="int" name="precio" placeboard="precio del producto"><br>
    <input type="int" name="stock" placeboard="stock del producto"><br>
    <input type="submit" value="Registrar">
</form>

<?php
if(!empty($_POST)){
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
    $stock = trim($_POST["stock"]);

    $contadorProducto = 0;

    if($nombre==""){
        echo "El campo nombre es obligatorio<br>";
        $contadorProducto++;
    }

    if($descripcion==""){
        echo "El campo descripcion es obligatorio<br>";
        $contadorProducto++;
    }

    if($precio==""){
        echo "El campo precio es obligatorio<br>";
        $contadorProducto++;
    }

    if($cantidad==""){
        echo "El campo cantidad es obligatorio<br>";
        $contadorProducto++;
    }
    
}