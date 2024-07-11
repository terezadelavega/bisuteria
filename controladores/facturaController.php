<?php
class facturaController {
    public function generarFactura($cartJson) {
        $cart = json_decode($cartJson, true);
        if (!$cart) {
            return ['productos' => [], 'total' => 0];
        }

        $productos = [];
        $total = 0;

        foreach ($cart['items'] as $item) {
            $nombre = $item['productName'];
            $cantidad = 1;  // Asumiendo que cada ítem es único, ajusta según tu lógica
            $precio = $item['productPrice'];
            $subtotal = $cantidad * $precio;

            $productos[] = [
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio' => $precio,
                'subtotal' => $subtotal
            ];

            $total += $subtotal;
        }

        return [
            'productos' => $productos,
            'total' => $total
        ];
    }
}


?>
