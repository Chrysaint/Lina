import {countItems, checkIfAdded, addToCart, removeFromCart} from "./cartFunctions.js";

const itemsInCart = JSON.parse(localStorage.getItem('items'));
const btn = document.getElementById('item-btn');
const itemId = btn.getAttribute("data-id");

countItems();
checkIfAdded(btn, itemId);

btn.addEventListener('click', (e) => {
    e.preventDefault();
    const items = JSON.parse(localStorage.getItem("items"));
    const id = btn.getAttribute("data-id");
    const title = btn.getAttribute("data-title");
    const img = btn.getAttribute("data-img");
    const price = btn.getAttribute("data-price");
    const quantity = btn.getAttribute("data-quantity");
    const btnName = btn.getAttribute("name");
    if (btnName == "add-to-cart") {
        addToCart(id, price, title, img, quantity);
    } else if (btnName == "remove-from-cart") {
        removeFromCart(id);
    }
    checkIfAdded(btn, id);
    countItems();
})