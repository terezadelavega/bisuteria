<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="correo" placeholder="Ingrese correo"><br>
    <input type="password" name="contrasena" placeholder="Ingrese contraseña"><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
if(isset($_POST["submit"])){
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    require_once "controladores/clienteController.php";
    $cc = new clienteController();
    $cc->login($correo, $contrasena);
}
?>
