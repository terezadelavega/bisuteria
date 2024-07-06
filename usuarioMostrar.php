<?php
    require_once "layout/header.php";
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
    require_once "controladores/usuarioController.php";
    $uc = new usuarioController();
    $usuarios = $uc->mostrar();
    echo "<h1>Bienvenid@: ".$_SESSION["usuario"]." (".$_SESSION["tipo"].")</h1>";
?>

<table class="table">
    <tr>
        <th>username</th>
        <th>contraseña</th>
        <th>nombres</th>
        <th>apellidos</th>
        <th>tipo</th>
    </tr>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr>
            <td>".$usuario["username"]."</td>
            <td>".$usuario["password"]."</td>
            <td>".$usuario["nombres"]."</td>
            <td>".$usuario["apellidos"]."</td>
            <td>".$usuario["tipo"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
    require_once "layout/footer.php";