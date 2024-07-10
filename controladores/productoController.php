<?php
require_once "modelos/Producto.php";

class productoController{
    public function guardar(String $nombre, String $descripcion, String $precio, int $stock){
        $producto = new Producto();
        return $producto->guardar($nombre, $descripcion, $precio, $stock);
        }
}