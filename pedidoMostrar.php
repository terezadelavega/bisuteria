<?php
    require_once "layout/header.php";
    require_once "controladores/pedidoController.php";
    $pec = new pedidoController();
    $pedido = $pec->mostrar();
?>

<table class="table">
    <tr>
        <th>NOMBRE DEL PRODUCTO</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th>PRECIO TOTAL</th>
    </tr>
    <?php
    /*foreach($pedidos as $pedido){
        echo "<tr>
            <td>".$pedido["pro.nombre"]."</td>
            <td>".$pedido["pro.precio"]."</td>
            <td>".$pedido["pe.cantidad"]."</td>
            <td>".$pedido["pe.precio_total"]."</td>
        </tr>";
    }*/
    ?>
</table>
<?php
require_once "layout/footer.php";