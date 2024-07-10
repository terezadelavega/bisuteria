<?php

require_once "Conn.php";

class Pedido{
    private $cantidad;
    private $precio_total;
    private $id_pedido;
    private $id_pago;

    public function __construct(){

    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT pro.nombre, pro.precio, pe.cantidad, pe.precio_total, u.nombres
        FROM pedido AS pe
        JOIN producto AS pro ON pe.id_producto = pro.id_producto
        JOIN usuario AS u ON pe.id_usuario = u.id_usuario
        WHERE pe.id_pedido = id_pedido;";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    public function guardar(int $cantidad, int $precio_total){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO pedido('cantidad', 'precio_total')
        VALUES('$cantidad', '$precio_total')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
/*INSERT INTO `bisuteria`.`pedido` (`cantidad`, `precio_total`, `id_usuario`, `id_producto`, `id_pago`)
VALUES ('1', '3.5', '1', '1', '2');*/
}

?>

