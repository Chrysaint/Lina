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
        <section class="container">
            <h2 class="heading">Корзина</h2>
            <div class="cart">
                <!-- <p class="cart_empty">Корзина пуста...</p> -->
                <div class="cart__left">

                    <ul class="cart__items">
                        <li class="cart__item">
                            <img src="./src/assets/img/catalogue/1.webp" alt="" class="cart__item__img">
                            <a href="" class="cart__item__name">Куртка зимняя</a>
                            <div class="cart__item__right">
                                <div class="cart__item__right__actions">
                                    <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn" name="plusBtn">+</button>
                                    <input type="text" class="cart__item__right__actions-counter cart__item__right__actions-counter__input" value="1">
                                    <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn" name="minusBtn">-</button>
                                </div>
                                <p class="cart__item__right__actions__price">232 руб.</p>
                                <button class="cart__item__right__actions__remove">Удалить</button>
                            </div>
                        </li>
                        <li class="cart__item">
                            <img src="./src/assets/img/catalogue/1.webp" alt="" class="cart__item__img">
                            <a href="" class="cart__item__name">Куртка зимняя</a>
                            <div class="cart__item__right">
                                <div class="cart__item__right__actions">
                                    <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn" name="plusBtn">+</button>
                                    <input type="text" class="cart__item__right__actions-counter cart__item__right__actions-counter__input" value="1">
                                    <button class="cart__item__right__actions-counter cart__item__right__actions-counter-btn" name="minusBtn">-</button>
                                </div>
                                <p class="cart__item__right__actions__price">232 руб.</p>
                                <button class="cart__item__right__actions__remove">Удалить</button>
                            </div>
                        </li>
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
                    <button type="button" id="order-btn" class="form__button">Оформить заказ</button>
                </form>
            </div>
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
</body>

</html>