<?php
require_once("./services/dbconnect.php");
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
    </main>

    <?php
        include_once('./src/components/footer.php')
    ?>
</body>

</html>