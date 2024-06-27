<?php
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
    require_once "controladores/clienteController.php";
    $cc = new clienteController();
    $clientes = $cc->mostrar();
    echo "<h1>Bienvenid@: ".$_SESSION["correo"]."</h1>";
?>

<table class="table">
    <tr>
        <th>nombre</th>
        <th>apellido</th>
        <th>correo</th>
        <th>telefono</th>
        <th>direccion</th>
    </tr>
    <?php
    foreach($clientes as $cliente){
        echo "<tr>
            <td>".$cliente["nombre"]."</td>
            <td>".$cliente["apellido"]."</td>
            <td>".$cliente["correo"]."</td>
            <td>".$cliente["telefono"]."</td>
            <td>".$cliente["direccion"]."</td>
        </tr>";
    }
    ?>
</table>