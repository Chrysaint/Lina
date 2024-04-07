<?php
require_once("./services/dblink.php");
session_start();
if ($_GET['gender']) {
    $genderId = $_GET['gender'];
    $query = "SELECT * FROM Items WHERE Genders_idGenders = $genderId";
} else {
    $query = "SELECT * FROM Items ORDER BY ItemsName ASC";
}
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
        </section>
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
    <script type="module" src="./src/assets/js/cartFunctions.js"></script>
    <script type="module" src="./src/assets/js/main.js"></script>
</body>

</html>