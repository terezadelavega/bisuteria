<?php
    require_once "layout/header.php";
    require_once "controladores/pedidoController.php";
    $pec = new pedidoController();
    $pedido = $pec->mostrar();
?>

<table class="table">
    <tr>
        <th>CANTIDAD</th>
        <th>PRECIO TOTAL</th>
    </tr>
    <?php
    foreach($pedidos as $pedido){
        echo "<tr>
            <td>".$pedido["cantidad"]."</td>
            <td>".$pedido["precio_total"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
require_once "layout/footer.php";