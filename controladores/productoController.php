<?php
require_once 'modelos/Producto.php';

class ProductoController {
    public function guardar($nombre, $descripcion, $precio, $stock) {
        $producto = new Producto();
        return $producto->guardar($nombre, $descripcion, $precio, $stock);
    }

    public function mostrar() {
        $producto = new Producto();
        return $producto->mostrar();
    }

}
