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
        <section class="main-page">
            <img src="./src/assets/img/index/1.webp" alt="" class="main-page__img">
        </section>
        <section class="section popular-section">
            <div class="container">
                <h2 class="subheading">Популярное</h2>
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
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
</body>

</html>