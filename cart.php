<?php
require_once("./services/dblink.php");
session_start();
$query = "SELECT * FROM Types ORDER BY TypesName ASC";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('./src/components/head.php')
?>

<body>
    <?php
    include_once('./src/components/header.php')
    ?>

    <main>
        <template id="cart-item-template">
            <li class="cart__item" id="cart-item-id">
                <img src="./src/assets/img/catalogue/1.webp" alt="" class="cart__item__img">
                <a href="" class="cart__item__name cart-item-title" name="cart-item-title">Куртка зимняя</a>
                <div class="cart__item__right">
                    <div class="cart__item__right__actions">
                        <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn minusBtn">-</button>
                        <input type="text" class="cart__item__right__actions-counter cart__item__right__actions-counter__input cart-item-quantity   " value="1">
                        <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn plusBtn">+</button>
                    </div>
                    <p class="not-visible items-price"></p>
                    <p class="cart__item__right__actions__price cart-item-price"></p>
                    <button class="cart__item__right__actions__remove" data-item-id="">Удалить</button>
                </div>
            </li>
        </template>
        <section class="container">
            <h2 class="heading">Корзина</h2>
            <p class="cart_empty not-visible">Корзина пуста...</p>
            <div class="cart">
                <div class="cart__left">

                    <ul class="cart__items">

                    </ul>
                </div>
                <form class="cart__right cart__form">
                    <div class="cart__form__row">
                        <input type="text" class="cart__form__input" placeholder="Имя*">
                        <input type="text" class="cart__form__input" placeholder="Фамилия*">
                    </div>
                    <input type="text" class="cart__form__input" placeholder="Телефон*">
                    <input type="text" class="cart__form__input" placeholder="Город*">
                    <input type="text" class="cart__form__input" placeholder="Улица*">
                    <div class="cart__form__row">
                        <input type="text" class="cart__form__input" placeholder="Дом*">
                        <input type="text" class="cart__form__input" placeholder="Квартира*">
                    </div>
                    <div class="cart__form__row">
                        <p class="cart__form__row-text cart__form__row-text_bold">Товаров в корзине:</p>
                        <p class="cart__form__row-text" id="total-items-in-cart"></p>
                    </div>
                    <div class="cart__form__row">
                        <p class="cart__form__row-text cart__form__row-text_bold">Итого:</p>
                        <p class="cart__form__row-text" id="total-price"></p>
                    </div>
                    <p class="cart-form-error">Заполните все поля</p>
                    <button type="button" id="order-btn" class="form__button">Оформить заказ</button>
                </form>
            </div>
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
    <script type="module" src="./src/assets/js/cartFunctions.js"></script>
    <script type="module" src="./src/assets/js/main.js"></script>
    <script type="module" src="./src/assets/js/cart.js"></script>
</body>

</html>