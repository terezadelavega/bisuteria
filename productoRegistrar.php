<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>REGISTRAR PRODUCTO</h1>
			</div>
                <link rel="stylesheet" href="styleLogin.css">
                <div class="login-form">
                    <div class="control-group">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <input type="text" name="nombre" placeholder="nombre del producto"><br>
                    <input type="text" name="descripcion" placeholder="descripcion del producto"><br>
                    <input type="int" name="precio" placeholder="precio del producto"><br>
                    <input type="int" name="stock" placeholder="stock del producto"><br>
                    <input class="btn btn-primary btn-large btn-block" type="submit" value="REGISTRAR">
                </form>
				</div>
			</div>
		</div>
	</div>
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

    if($stock==""){
        echo "El campo cantidad es obligatorio<br>";
        $contadorProducto++;
    }

    if($contadorProducto==0){
        require_once "controladores/productoController.php";
        $pc = new ProductoController();
        $respuesta = $pc->guardar($nombre, $descripcion, $precio, $stock);
        if($respuesta > 0){
            echo "Ha registrado correctamente el producto";
        }else{
            echo "ERROR: el producto no se ha registrado";
        }
    }
    
}
?>