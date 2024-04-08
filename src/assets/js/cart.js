import {countItems, countTotalPrice, removeFromCart, updateCartItem} from "./cartFunctions.js";

const cart = document.querySelector(".cart");
const cartList = document.querySelector('.cart__items');
const emptyCartText = document.querySelector('.cart_empty');
const totalPriceText = document.querySelector('#total-price');
const totalItemsInCart = document.querySelector('#total-items-in-cart');

function drawItem(id, title, img, quantity, price){
    const cartItemTemplate = document.getElementById('cart-item-template');
    const itemTitle = cartItemTemplate.content.querySelector('.cart-item-title');
    const itemId = cartItemTemplate.content.querySelector('.cart__item');
    const itemImg = cartItemTemplate.content.querySelector('.cart__item__img');
    const itemQuantity = cartItemTemplate.content.querySelector('.cart-item-quantity');
    const itemPrice = cartItemTemplate.content.querySelector('.cart-item-price');
    const removeBtn = cartItemTemplate.content.querySelector('.cart__item__right__actions__remove');
    const itemsPrice = cartItemTemplate.content.querySelector('.items-price');

    removeBtn.setAttribute("data-item-id", id);

    itemsPrice.textContent = price;

    itemTitle.textContent = title;
    itemTitle.setAttribute("href", `item.php?id=${id}`);

    itemId.setAttribute("id", `cart-item-${id}`);
    itemId.setAttribute("data-id", id);
    
    itemImg.setAttribute("src", `./src/assets/img/catalogue/${img}`);
    
    itemPrice.textContent = `${parseInt(price * quantity)} руб.`;

    itemQuantity.value = quantity;
    
    const item = cartItemTemplate.content.cloneNode(true);
    cartList.appendChild(item);
}


function drawItems() {
    const itemsInCart = JSON.parse(localStorage.getItem('items'));
    if (itemsInCart == null) return;
    itemsInCart.forEach(item => {
        drawItem(item.id, item.title, item.img, item.quantity, item.price);
    })
}

function removeItem(id) {
    const item =document.querySelector(`#cart-item-${id}`);
    item.remove();
}

function updateCartState() {
    const itemsInCart = JSON.parse(localStorage.getItem('items'));
    if (itemsInCart == null) {
        emptyCartText.classList.remove("not-visible");
        cart.classList.add("not-visible");
    } else {
        emptyCartText.classList.add("not-visible");
        cart.classList.remove("not-visible");
    }
}

totalItemsInCart.textContent = countItems();
drawItems();
updateCartState();
totalPriceText.textContent = `${countTotalPrice()} руб.`;
totalItemsInCart.textContent = countItems();

const plusBtn = document.querySelectorAll('.plusBtn');
const minusBtn = document.querySelectorAll('.minusBtn');
const countInput = document.querySelector('.cart__item__right__actions-counter__input');

plusBtn.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        const input = e.target.previousElementSibling;
        const item = e.target.parentNode.parentNode.parentNode;
        const id = item.getAttribute("data-id");
        const quantity = parseInt(input.value) + 1;
        input.value = quantity;
        updateCartItem(id, quantity);
        const itemsCounter = countItems();
        totalItemsInCart.textContent = itemsCounter;
        updateTotalItemPrice(e.target, quantity);
        const totalPrice = countTotalPrice();
        totalPriceText.textContent = `${totalPrice} руб.`;
    })
})

minusBtn.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        const input = e.target.nextElementSibling;
        const item = e.target.parentNode.parentNode.parentNode;
        const id = item.getAttribute("data-id");
        let quantity = parseInt(input.value) - 1;
        if (quantity < 1) {
            quantity = 1;
        }
        input.value = quantity;
        updateCartItem(id, quantity);
        const itemsCounter = countItems();
        totalItemsInCart.textContent = itemsCounter;
        updateTotalItemPrice(e.target, quantity);
        const totalPrice = countTotalPrice();
        totalPriceText.textContent = `${totalPrice} руб.`;
    })
})

countInput.addEventListener("change", (e) => {
    let quantity = e.target.value;
    const item = e.target.parentNode.parentNode.parentNode;
    const id = item.getAttribute("data-id");
    if (quantity < 1) {
        quantity = 1;
    }
    e.target.value = quantity;
    updateCartItem(id,quantity);
    const itemsCounter = countItems();
    totalItemsInCart.textContent = itemsCounter;
    updateTotalItemPrice(e.target, quantity);
    const totalPrice = countTotalPrice();
    totalPriceText.textContent = `${totalPrice} руб.`;
})

const removeBtn = document.querySelectorAll('.cart__item__right__actions__remove');

removeBtn.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        const id = e.target.getAttribute("data-item-id");
        removeFromCart(id);
        removeItem(id);
        updateCartState();
        const itemsCounter = countItems();
        totalItemsInCart.textContent = itemsCounter;
        const totalPrice = countTotalPrice();
        totalPriceText.textContent = `${totalPrice} руб.`;
    })
})


function updateTotalItemPrice(el, quantity) {
    const itemPriceBlock = el.parentNode.nextElementSibling;
    const itemPrice = parseInt(itemPriceBlock.textContent);
    const totalPriceBlock = el.parentNode.nextElementSibling.nextElementSibling;
    const totalPrice = itemPrice * quantity;
    totalPriceBlock.textContent = `${totalPrice} руб.`;
}