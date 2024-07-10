<?php
    require_once "layout/header.php";
    require_once "controladores/productoController.php";
    $pc = new productoController();
    $productos = $pc->mostrar();
    /*echo "<h1>Bienvenido(a) ".$_SESSION["usuario"]." (".$_SESSION["tipo"].")</h1>";*/
?>

<table class="table">
    <tr>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php
    foreach($productos as $producto){
        echo "<tr>
            <td>".$producto["nombre"]."</td>
            <td>".$producto["descripcion"]."</td>
            <td>".$producto["precio"]."</td>
            <td>".$producto["stock"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
require_once "layout/footer.php";