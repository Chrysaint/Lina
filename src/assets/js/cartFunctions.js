export function countItems() {
    const counter = document.querySelector('.cart-counter');
    const items = JSON.parse(localStorage.getItem("items"));
    let count = 0;
    if (items != null) {
        for (let item of items) {
            count += parseInt(item.quantity);
        }
    }
    if (count <= 0) {
        counter.classList.add("disabled");
    } else {
        counter.classList.remove("disabled");
    }
    counter.textContent = count;
    return count;
}

export function addToCart(id, price, title, img, quantity) {
    const items = JSON.parse(localStorage.getItem("items"));
    if(items == null) {
        const item = {
            id: id,
            title: title,
            img: img,
            price: price,
            quantity: quantity
        }
        localStorage.setItem("items", JSON.stringify([item]));
    } else {
        const item = items.find(i => i.id == id);
        if (item) {
            for (let item of items) {
                if (item.id == id) {
                    item.quantity++;
                    break;
                }
            }
        } else {
            const newItem = {
                id: id,
                title: title,
                img: img,
                price: price,
                quantity: quantity
            }
            const newState = [...items, newItem];
            localStorage.setItem("items", JSON.stringify(newState));
        }
    }
}

export function updateCartItem(id, quantity) {
    const items = JSON.parse(localStorage.getItem("items"));
    for (let item of items) {
        if (item.id == id) {
            item.quantity = quantity;
        }
    }
    localStorage.setItem("items", JSON.stringify(items));
}

export function removeFromCart(id){
    const items = JSON.parse(localStorage.getItem("items"));
    if (items == null) return;
    const temp = items.filter(item => item.id != id);
    if (temp.length == 0){
        localStorage.removeItem("items");
    } else {
        localStorage.setItem("items", JSON.stringify(temp));
    }
}

export function checkIfAdded(btn, itemId) {
    const items = JSON.parse(localStorage.getItem("items"));
    let itemInLocalStorage;
    if(items != null || items instanceof Array) {
        itemInLocalStorage = items.find((i) => i.id === itemId);
    }
    if (itemInLocalStorage) {
        btn.setAttribute('name', "remove-from-cart");
        btn.textContent = "Убрать из корзины"
    } else {
        btn.setAttribute('name', "add-to-cart");
        btn.textContent = "Добавить в корзину"
    }
}

export function countTotalPrice() {
    const items = JSON.parse(localStorage.getItem("items"));
    if (items == null) return;
    const total = items.reduce((acc, item) => {
        acc = acc + (parseInt(item.price) * parseInt(item.quantity));
        return acc;
    }, 0);
    return total;
}