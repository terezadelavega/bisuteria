<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <input type="text" name="username" placeholder="Ingrese usuario"><br>
    <input type="password" name="contra" placeholder="Ingrese contraseña"><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["contra"];
    require_once "controladores/usuarioController.php";
    $uc = new UsuarioController();
    $uc->login($username, $contra);
}
?>