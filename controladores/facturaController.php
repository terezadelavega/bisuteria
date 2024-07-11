<?php
require_once 'factura.php';

class facturaController {
    public function generarFactura($cart) {
        $factura = array(
            'productos' => array(),
            'total' => 0
        );

        foreach ($cart as $item) {
            $producto = array(
                'nombre' => $item['name'],
                'cantidad' => $item['quantity'],
                'precio' => $item['price'],
                'subtotal' => $item['quantity'] * $item['price']
            );
            $factura['productos'][] = $producto;
            $factura['total'] += $producto['subtotal'];
        }

        return $factura;
    }
}
?>
