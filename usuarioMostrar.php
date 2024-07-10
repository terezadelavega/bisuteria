<?php
    require_once "layout/header.php";
    require_once "controladores/usuarioController.php";
    $uc = new usuarioController();
    $usuarios = $uc->mostrar();
    echo "<h1>Bienvenido(a) ".$_SESSION["usuario"]." (".$_SESSION["tipo"].")</h1>";
?>

<table class="table">
    <tr>
        <th>username</th>
        <th>contra</th>
        <th>apellidos</th>
        <th>nombres</th>
        <th>tipo</th>
        <th>direccion</th>
    </tr>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr>
            <td>".$usuario["username"]."</td>
            <td>".$usuario["contrasena"]."</td>
            <td>".$usuario["apellidos"]."</td>
            <td>".$usuario["nombres"]."</td>
            <td>".$usuario["tipo"]."</td>
            <td>".$usuario["direccion"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
require_once "layout/footer.php";