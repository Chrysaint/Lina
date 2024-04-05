<?php
require_once("./services/dblink.php");
session_start();
// $itemId = $_GET['id'];
// $query = "SELECT * FROM Items WHERE idItems = $itemId";
// $result = mysqli_query($link, $query);
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
        <section class="section__item">
            <div class="container">
                <h2 class="heading">
                    Кукртка ношенная синяя
                </h2>
                <div class="item__wrapper">
                    <div class="item__wrapper__img">
                        <img src="./src/assets/img/catalogue/10.webp" alt="">
                    </div>
                    <div class="item__wrapper__info">
                        <div class="item__wrapper__info-top">
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Цвет:</p>
                                <p class="item__wrapper__info-text">Синий</p>
                            </div>
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Тип:</p>
                                <p class="item__wrapper__info-text">Куртка</p>
                            </div>
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Пол:</p>
                                <p class="item__wrapper__info-text">Мужской</p>
                            </div>
                        </div>
                        <div class="item__wrapper__info-bottom">
                            <button class="form__button">Добавить в корзину</button>
                            <div class="item__wrapper__info-bottom-price">
                                <p class="item__wrapper__info-text">Стоимость:</p>
                                <p class="item__wrapper__info-price">4599 руб.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
</body>

</html>