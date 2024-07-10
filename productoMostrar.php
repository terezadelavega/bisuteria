<?php
    require_once "controladores/productoController.php";
    $pc = new productoController();
    $productos = $pc->mostrar();
    /*echo "<h1>Bienvenido(a) ".$_SESSION["usuario"]." (".$_SESSION["tipo"].")</h1>";*/
?>
<link rel="stylesheet" href="style.css">
<div>
        <h2>BISUTERIA SHOP</h2>
        
        <button id="cart-button" class="trigger cart-button-style">CARRITO</button>
        
        <div id="shop">
            <!-- Productos -->
            <!-- Repite este bloque para cada producto -->
    <?php
    foreach($productos as $producto){
        echo "  <div class='products ios apple' id='iphone-x'>
                <img class='product-image' src='img/corazon.png'>
                <p class='product-name'>".$producto["nombre"]."</p>
                <p class='product-description'>".$producto["descripcion"]."</p>
                <p class='product-price' value='999'>".$producto["precio"]."</p>
                <button class='add-to-cart'>AGREGAR AL CARRITO</button>
                </div>
            ";
    }
    ?>
            
    <div id="cart-wrapper" class="slider close">
        <div id="cart">
            <div id="cart-products-wrapper">
                <table id="cart-table">
                    <thead id="cart-table-header">
                        <tr>
                            <th class="name-col">Product Name</th> 
                            <th class="quantity-col">Quantity</th>       
                            <th class="price-col">Price</th>
                            <th class="updated-price-col">Updated Price</th>
                            <th class="update-col">Update</th>
                            <th class="remove-col">Remove</th>
                        </tr>
                        <tr>
                            <th class="name-col">Product Name</th> 
                            <th class="quantity-col">Quantity</th>       
                            <th class="price-col">Price</th>
                            <th class="updated-price-col">Updated Price</th>
                            <th class="update-col">Update</th>
                            <th class="remove-col">Remove</th>
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
                                <input id="promo" placeholder="Input Promo Code">
                                <button id="apply-promo">Apply Promo</button>
                            </td>
                            <td>
                                <button id="checkout">Checkout</button>
                            </td>
                            <td>
                                <button id="ks" class="keep-shopping">Keep Shopping</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js.js"></script>

<?php
require_once "layout/footer.php";