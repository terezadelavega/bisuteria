let cartToggle = document.getElementById('cart-button');
let cartWrapper = document.getElementById('cart-wrapper');
let cartTableBody = document.getElementById('cart-table-body');
let subtotal = document.getElementById('subtotal');
let total = document.getElementById('total');
let applyPromoButton = document.querySelector('#apply-promo');
let addToCartButton = document.querySelectorAll('.add-to-cart');
let cart = {
    items: [],
    subtotal: 0,
    iphoneDis: 0,
    androidDis: 0,
    Off5: 0,
    finalDis: 0,
    total: 0
};
let added = [];
let itemClass = {};

// Listeners
cartToggle.addEventListener('click', toggleCart);
applyPromoButton.addEventListener('click', applyPromo);
addToCartButton.forEach(button => button.addEventListener('click', addToCart));
document.querySelectorAll('.keep-shopping').forEach(button => button.addEventListener('click', toggleCart));

// Funciones
function toggleCart() {
    cartWrapper.classList.toggle('close');
}

function addToCart(event) {
    if (added.includes(event.target.parentElement.id)) {
        let duplicateId = '#' + event.target.parentElement.id;
        cartTableBody.querySelector(duplicateId).querySelector('#quantity-value').value++;
        return;
    }
    
    let product = event.target.parentNode;
    let productId = product.id;
    added.unshift(productId);
    let productName = product.querySelector('.product-name').innerHTML;
    let productPrice = Number(product.querySelector('.product-price').innerHTML.replace(/[^\d.-]/g, ''));
    let productUpdatedPrice = productPrice;

    let thisClass = product.classList.value.split(' ');
    itemClass[productId] = thisClass;

    cart.items.push({
        product: productId,
        productName: productName,
        productPrice: productPrice,
        productUpdatedPrice: productUpdatedPrice,
    });

    let productRow = document.createElement('tr');
    productRow.setAttribute('id', productId);
    cartTableBody.appendChild(productRow);
    
    for (let num = 0; num <= 6; num++) {
        let newColumn = document.createElement('td');
        productRow.appendChild(newColumn);
    }
            
    productRow.childNodes[0].innerHTML = productName;
    productRow.childNodes[1].innerHTML = "<input name='quantity' id='quantity-value' type='number' value='1'>";
    productRow.childNodes[2].innerHTML = productPrice;
    productRow.childNodes[2].setAttribute('id', 'product-price');
    productRow.childNodes[2].setAttribute('class', 'cart-product-price');
    productRow.childNodes[3].innerHTML = productPrice;
    productRow.childNodes[3].setAttribute('id', 'updated-product-price');
    productRow.childNodes[3].setAttribute('class', 'cart-updated-product-price');
    productRow.childNodes[4].innerHTML = "<button id='update' onclick='updateQuantity(this)'>Update</button>"
    productRow.childNodes[5].innerHTML = "<button class='remove' onclick='removeFromCart(this)'>X</button>";
    
    updateSubtotal();
    updateTotal();
    toggleCart();
}

function removeFromCart(event) {
    let parentRow = event.parentNode.parentNode;
    let parentBody = parentRow.parentNode;
    let parentRowId = parentRow.id;
    parentBody.removeChild(parentRow);
    
    var index = added.indexOf(parentRowId);
    if (index !== -1) {
        added.splice(index, 1);
    }
    
    for (let i = 0; i < cart.items.length; i++) {
        if (cart.items[i].product === parentRowId) {
            cart.items.splice(i, 1);
            break;
        }
    }
    
    cart.finalDis = 0;
    updateSubtotal();
    updateTotal();
}

function updateQuantity(event) {
    let parentRow = event.parentNode.parentNode;
    let parentRowId = parentRow.id;
    let inputQuantity, productPrice, updatedPrice;
    
    for (let node of parentRow.childNodes) {
        if (node.id === 'quantity') inputQuantity = node.firstChild;
        if (node.id === 'product-price') productPrice = Number(node.innerHTML);
        if (node.id === 'updated-product-price') updatedPrice = node;
    }
    
    if (inputQuantity.value <= 0) {
        removeFromCart(event);
        return;
    }
    
    let totalPrice = inputQuantity.value * productPrice;
    updatedPrice.innerHTML = totalPrice;
    
    for (let item of cart.items) {
        if (item.product === parentRowId) item.productUpdatedPrice = totalPrice;
    }
    
    updateSubtotal();
    updateTotal();
}

function applyPromo() {
    let promoInputValue = document.getElementById('promo').value.toUpperCase();
    switch (promoInputValue) {
        case 'IPHONEX15':
            let price = 0;
            for (item of cart.items) {
                if (item.product.includes('iphone-x')) {
                    price += item.productPrice;
                    let pro15Dis = (price * 15) / 100;
                    cart.iphoneDis = pro15Dis;
                    cart.finalDis = cart.iphoneDis.toFixed(2);
                    addDiscountAmount();
                }
            }
            alert('15% Off the iPhone X!');
            break;
        case 'ANDROID10':
            for (item of cart.items) {
                if (isIncluded('android', itemClass[item.product])) {
                    let product = cartTableBody.querySelector('#' + item.product);
                    let productUpdatedPrice = Number(product.querySelector('#updated-product-price').innerHTML);
                    let product10Dis = (productUpdatedPrice * 10) / 100;
                    cart.androidDis = product10Dis;
                    cart.finalDis = cart.androidDis.toFixed(2);
                    addDiscountAmount();
                }
            }
            alert('10% Off Android devices!');
            break;
        case 'OFF5':
            let pro5Dis = (cart.subtotal * 5) / 100;
            cart.Off5 = pro5Dis;
            cart.finalDis = cart.Off5.toFixed(2);
            addDiscountAmount();
            alert('5% Off all items!');
            break;
        default:
            alert('Promo code not recognized.');
            return;
    }
}

function addDiscountAmount() {
    updateSubtotal();
    let cartTotal = document.getElementById('total');
    cartTotal.innerHTML = (cart.subtotal - cart.finalDis).toFixed(2);
}

function updateSubtotal() {
    let subtotalDisplay = document.getElementById('subtotal');
    let subtotal = 0;
    for (let item of cart.items) subtotal += item.productUpdatedPrice;
    cart.subtotal = subtotal;
    subtotalDisplay.innerHTML = cart.subtotal.toFixed(2);
}

function updateTotal() {
    let totalDisplay = document.getElementById('total');
    let total = 0;
    for (let item of cart.items) total += item.productUpdatedPrice;
    cart.total = total;
    totalDisplay.innerHTML = cart.total.toFixed(2);
}

function isIncluded(check, array) {
    return array.includes(check);
}