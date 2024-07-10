<?php
require_once "modelos/Pedido.php";
class pedidoController{
    public function mostrar(){
        $pedido = new Pedido();
        return $pedido->mostrar();
    }

    public function guardar(String $cantidad, String $precio_total){
        $pedido = new Pedido();
        return $pedido->guardar('$cantidad', '$precio_total');
        }
}