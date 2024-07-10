<?php
class Pedido{
    private $cantidad;
    private $precio_total;
    private $id_usuario;
    private $id_pedido;
    private $id_pago;

    public function __construct(){

    }

    public function mostrar(int $id_producto){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido";
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

