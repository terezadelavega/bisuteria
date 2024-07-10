<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PÁGINA DE BISUTERÍA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
  <nav data-bs-theme="dark" class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sesion Iniciada</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="productoRegistrar.php">Registrar Producto</a>
        </li>
        <?php
        session_start();
        if($_SESSION["tipo"]=="Administrador"){
          echo "<li class='nav-item'>
                  <a class='nav-link' href='productoMostrar.php'>Ver Producto</a>
              </li>";
      }        
        else{
            echo "<li class='nav-item'>
                    <a class='nav-link' href='usuarioMostrar.php'>Ver Empleados</a>
                </li>";
        }

        if($_SESSION["tipo"]=="Cliente"){
          echo "<li class='nav-item'>
                  <a class='nav-link' href='productoMostrar.php'>Ver Producto</a>
              </li>";
      }        
        if($_SESSION["tipo"]=="Empleado"){
        echo "<li class='nav-item'>
                <a class='nav-link' href='productoMostrar.php'>Ver Producto</a>
            </li>";
        }else {
          echo " ";
        }          
    ?>  
        <li class="nav-item">
          <a class="nav-link" href="login.php">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>    
    <div class="container mt-3">