<?php
require_once "controladores/productoController.php";
$pc = new productoController();
$productos = $pc->mostrar();
?>

<link rel="stylesheet" href="style.css">

<div>
    <h2>BISUTERIA SHOP</h2>
        
    <button id="cart-button" class="trigger cart-button-style">CARRITO</button>
        
    <div id="shop">
       <!-- Productos -->
        <?php foreach($productos as $producto): ?>
        <div class='products ios apple' id='product-1'>
            <img class='product-image' src='img/joyas.png'>
            <p class='product-name'>Jade</p>
            <p class='product-description'>Nueva edicion</p>
            <p class='product-price' value='999'>200.00</p>
            <button class='add-to-cart' data-product-id= '1'>AGREGAR AL CARRITO</button>
        </div>
        
        <div class='products ios apple' id='product-2'>
            <img class='product-image' src='img/corazon.png'>
            <p class='product-name'>Jade</p>
            <p class='product-description'>Nueva edicion</p>
            <p class='product-price' value='999'>100.00</p>
            <button class='add-to-cart' data-product-id= '2' >AGREGAR AL CARRITO</button>
        </div>

        <div class='products ios apple' id='product-3'>
            <img class='product-image' src='img/paloma.jpg'>
            <p class='product-name'>Florence</p>
            <p class='product-description'> Una unica edicion</p>
            <p class='product-price' value='999'>400.00</p>
            <button class='add-to-cart' data-product-id= '3' >AGREGAR AL CARRITO</button>
        </div>

        <div class='products ios apple' id='product-4'>
            <img class='product-image' src='img/esmeralda.jpg'>
            <p class='product-name'>Collar </p>
            <p class='product-description'>Esmeralda</p>
            <p class='product-price' value='999'>300.00</p>
            <button class='add-to-cart' data-product-id= '4' >AGREGAR AL CARRITO</button>
        </div>

        <div class='products ios apple' id='product-5'>
            <img class='product-image' src='img/anillo.jpg'>
            <p class='product-name'>Unico</p>
            <p class='product-description'>De corazon</p>
            <p class='product-price' value='999'>300.00</p>
            <button class='add-to-cart' data-product-id= '5' >AGREGAR AL CARRITO</button>
        </div>

        <div class='products ios apple' id='product-6'>
            <img class='product-image' src='img/anillo.png'>
            <p class='product-name'>Unico</p>
            <p class='product-description'>Diamante</p>
            <p class='product-price' value='999'>500.00</p>
            <button class='add-to-cart' data-product-id= '6' >AGREGAR AL CARRITO</button>
        </div>

        <div class='products ios apple' id='product-7'>
            <img class='product-image' src='img/image.jpg'>
            <p class='product-name'>Limitado</p>
            <p class='product-description'>Con diamantes en las alas</p>
            <p class='product-price' value='999'>400.00</p>
            <button class='add-to-cart' data-product-id= '7' >AGREGAR AL CARRITO</button>
        </div>

        <?php endforeach; ?>
    </div>

    <!-- Cuadro de Confirmación -->
    <div id="confirmationBox" style="display: none;">
        ¡Producto agregado al carrito!
    </div>

    <div id="cart-wrapper" class="slider close">
        <div id="cart">
            <div id="cart-products-wrapper">
                <table id="cart-table">
                    <thead id="cart-table-header">
                        <tr>
                            <th class="name-col">Nombre del producto</th>
                            <th class="quantity-col">Cantidad</th>
                            <th class="price-col">Precio unitario</th>
                            <th class="subtotal-col">Subtotal</th>
                            <th class="update-col">Actualizar</th>
                            <th class="remove-col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="cart-table-body"></tbody>
                </table>
            </div>
        </div>
        <div id="amount-controls">
            <div id="cart-amount-wrapper">
                <table>
                    <tbody>
                        <tr id="subtotal-wrapper">
                            <td id="subtotal-label">Subtotal:</td>
                            <td id="subtotal">0.00</td>
                        </tr>
                        <tr id="total-wrapper">
                            <td id="total-label">Total:</td>
                            <td id="total">0.00</td>
                        </tr>
                        <tr id="promo-checkout">
                            <td id="promo-wrapper">
                                <button id="apply-promo">Apply Promo</button>
                            </td>
                            <td>
                                <button id="checkout">Compra Realizada</button>
                            </td>
                            <td>
                                <button id="ks" class="keep-shopping">Seguir Comprando</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="js.js"></script>

<?php require_once "layout/footer.php"; ?>



