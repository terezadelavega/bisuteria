<?php
    require_once "layout/header.php";
    require_once "controladores/pedidoCotroller.php";
    $pec = new pedidoController();
    $pedido = $pec->mostrar();
?>
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
<table class="table">
    <h2>DATOS DEL PEDIDO</h2>
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