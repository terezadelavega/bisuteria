<?php
session_start();

if (isset($_SESSION["id_cliente"])) {
    header("Location: clienteMostrar.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
