import {countItems, isCartEmpty, removeFromCart, updateCartItem} from "./cartFunctions.js";

const cart = document.querySelector(".cart");
const cartList = document.querySelector('.cart__items');
const cartItemTemplate = document.getElementById('cart-item-template');
const emptyCartText = document.querySelector('.cart_empty');

function drawItem(id, title, img, quantity, price){
    const itemTitle = cartItemTemplate.content.querySelector('.cart-item-title');
    const itemId = cartItemTemplate.content.getElementById('cart-item-id');
    const itemImg = cartItemTemplate.content.querySelector('.cart__item__img');
    const itemQuantity = cartItemTemplate.content.querySelector('.cart-item-quantity');
    const itemPrice = cartItemTemplate.content.querySelector('.cart-item-price');
    const removeBtn = cartItemTemplate.content.querySelector('.cart__item__right__actions__remove');

    removeBtn.setAttribute("data-item-id", id);

    itemTitle.textContent = title;
    itemTitle.setAttribute("href", `item.php?id=${id}`);

    itemId.setAttribute("id", `cart-item-${id}`);
    
    itemImg.setAttribute("src", `./src/assets/img/catalogue/${img}`);
    
    itemPrice.textContent = price;

    itemQuantity.value = quantity;
    
    const item = cartItemTemplate.content.cloneNode(true);
    cartList.appendChild(item);
}

function updateCartState() {
    const cartItems = document.querySelectorAll(".cart__item");
    cartItems.forEach(item => () => {
        item.remove();
    })
    const itemsInCart = JSON.parse(localStorage.getItem('items'));
    for (let item of itemsInCart) {
        drawItem(item.id, item.title, item.img, item.quantity, item.price);
    }
}

isCartEmpty(emptyCartText, cart);
updateCartState();
