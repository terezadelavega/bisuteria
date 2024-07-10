<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
            <link rel="stylesheet" href="styleLogin.css">
			<div class="login-form">
				<div class="control-group">
                    <form method="post" aligen="center" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
                    <input type="text" name="username" placeholder="Ingrese usuario"><br>
                    <input type="password" name="contrasena" placeholder="Ingrese contraseña"><br>
                    <input type="submit" name="submit" value="Login">
                </form>

                <?php
                if(isset($_POST["submit"])){
                    $username = $_POST["username"];
                    $contrasena = $_POST["contra"];
                    require_once "controladores/usuarioController.php";
                    $uc = new UsuarioController();
                    $uc->login($username, $contrasena);
                }
                ?>
				</div>

				<a class="btn btn-primary btn-large btn-block" href="#">ACCEDER</a>
			</div>
		</div>
	</div>
</body>