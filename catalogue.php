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
            <h2 class="heading">Каталог</h2>
            <div class="catalogue">
                <ul class="catalogue__list">
                    <li class="catalogue__item">
                        <a href="" class="catalogue__item-link"></a>    
                        <div class="catalogue__item-img">
                            <img src="./src/assets/img/catalogue/1.webp" alt="">
                        </div>
                        <p class="catalogue__item-name">Курта синяя</p>
                        <p class="catalogue__item-price">255 руб.</p>
                    </li>
                    <li class="catalogue__item">
                        <a href="" class="catalogue__item-link"></a>    
                        <div class="catalogue__item-img">
                            <img src="./src/assets/img/catalogue/1.webp" alt="">
                        </div>
                        <p class="catalogue__item-name">Курта синяя</p>
                        <p class="catalogue__item-price">255 руб.</p>
                    </li>
                    <li class="catalogue__item">
                        <a href="" class="catalogue__item-link"></a>    
                        <div class="catalogue__item-img">
                            <img src="./src/assets/img/catalogue/1.webp" alt="">
                        </div>
                        <p class="catalogue__item-name">Курта синяя</p>
                        <p class="catalogue__item-price">255 руб.</p>
                    </li>
                    <li class="catalogue__item">
                        <a href="" class="catalogue__item-link"></a>    
                        <div class="catalogue__item-img">
                            <img src="./src/assets/img/catalogue/1.webp" alt="">
                        </div>
                        <p class="catalogue__item-name">Курта синяя</p>
                        <p class="catalogue__item-price">255 руб.</p>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
</body>

</html>