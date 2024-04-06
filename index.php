<?php
require_once("./services/dblink.php");
session_start();
$query = "SELECT * FROM items ORDER BY orderCounter DESC LIMIT 4";
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
                <h2 class="heading">Популярное</h2>
                <div class="catalogue catalogue_main-page">
                    <ul class="catalogue__list">
                        <?php
                            while($item = mysqli_fetch_array($result)) {
                                echo '
                                    <li class="catalogue__item">
                                        <a href="item.php?id='.$item['idItems'].'" class="catalogue__item-link"></a>    
                                        <div class="catalogue__item-img">
                                            <img src="./src/assets/img/catalogue/'.$item['ItemsImg'].'" alt="">
                                        </div>
                                        <p class="catalogue__item-name">'.$item['ItemsName'].'</p>
                                        <p class="catalogue__item-price">'.$item['ItemsPrice'].' руб.</p>
                                    </li>
                                ';
                            }
                        ?>
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