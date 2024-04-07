<?php
require_once("./services/dblink.php");
session_start();
$itemId = $_GET['id'];
$query = "SELECT * FROM `items` INNER JOIN colors ON items.Colors_idColors = colors.idColors INNER JOIN types ON items.Types_idTypes = types.idTypes INNER JOIN genders ON items.Genders_idGenders = genders.idGenders WHERE idItems = $itemId";
$result = mysqli_query($link, $query);
$item = mysqli_fetch_array($result);
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
                    <?php echo $item['ItemsName']?>
                </h2>
                <div class="item__wrapper">
                    <div class="item__wrapper__img">
                        <img src="./src/assets/img/catalogue/<?php echo $item['ItemsImg']?>" alt="">
                    </div>
                    <div class="item__wrapper__info">
                        <div class="item__wrapper__info-top">
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Цвет:</p>
                                <p class="item__wrapper__info-text"><?php echo $item['ColorsName']?></p>
                            </div>
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Тип:</p>
                                <p class="item__wrapper__info-text"><?php echo $item['TypesName']?></p>
                            </div>
                            <div class="item__wrapper__info-row">
                                <p class="item__wrapper__info-text">Пол:</p>
                                <p class="item__wrapper__info-text"><?php echo $item['GendersName']?></p>
                            </div>
                        </div>
                        <div class="item__wrapper__info-bottom">
                            <button id="item-btn" name="" class="form__button" data-title="<?php echo $item['ItemsName']?>" data-img="<?php echo $item['ItemsImg']?>" data-price="<?php echo $item['ItemsPrice']?>" data-quantity="1" data-id="<?php echo $item['idItems']?>"></button>
                            <div class="item__wrapper__info-bottom-price">
                                <p class="item__wrapper__info-text">Стоимость:</p>
                                <p class="item__wrapper__info-price"><?php echo $item['ItemsPrice']?> руб.</p>
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
    <script type="module" src="./src/assets/js/cartFunctions.js"></script>
    <script type="module" src="./src/assets/js/item.js"></script>
</body>

</html>