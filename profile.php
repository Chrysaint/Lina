<?php
include("./services/dblink.php");
session_start();
$userId = $_COOKIE['user'];
if(!$userId) {
    header("location: ./login.php");
}
$query = "SELECT * FROM Users WHERE idUsers = '$userId'";
$result = mysqli_query($link, $query);
$userInfo = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include("./src/components/head.php");
?>

<body>
    <?php
        include_once('./src/components/header.php')
    ?>

    <main>

        <section class="container profile-section">
            <h2 class="page-title">Профиль</h2>
            <div class="profile__wrapper">
                <div class="profile__data">
                    <h3 class="page-subtitle">Ваши данные:</h3>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Имя: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UsersName']?></p>
                    </div>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Фамилия: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UsersSurname']?></p>
                    </div>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Телефон: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UsersPhone']?></p>
                    </div>
                    <a href="./services/logout.php" class="form__button">Выйти из аккаунта</a>
                </div>
                <ul class="profile__entries">
                    
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