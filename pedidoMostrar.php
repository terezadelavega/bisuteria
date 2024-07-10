<?php
    require_once "layout/header.php";
    require_once "controladores/pedidoCotroller.php";
    $pec = new pedidoController();
    $pedido = $pec->mostrar();
?>

<table class="table">
    <tr>
        <th>NOMBRE DEL PRODUCTO</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th>PRECIO TOTAL</th>
        <th>NOMBRE CLIENTE</th>
    </tr>
    <?php
    foreach($pedido as $pedido){
        echo "<tr>
            <td>".$pedido["nombre"]."</td>
            <td>".$pedido["precio"]."</td>
            <td>".$pedido["cantidad"]."</td>
            <td>".$pedido["precio_total"]."</td>
            <td>".$pedido["nombres"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
require_once "layout/footer.php";