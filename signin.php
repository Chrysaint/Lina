<?php
require_once("./services/dblink.php");
session_start();
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
            <h2 class="heading heading-form">Авторизация</h2>

            <form action="" class="from">
                <div class="form__row">
                    <input type="text" id="login" class="input" placeholder="Ваш логин">
                </div>
                <div class="form__row">
                    <input type="password" id="password" class="input" placeholder="Ваш пароль">
                    <p class="form__error" id="auth-error"></p>
                </div>
                <button type="button" id="login-button" class="form__button">Войти</button>
                <a href="/register.php" class="form__link">Зарегистрироваться!</a>
            </form>


        </section>
    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
    <script type="module" src="./src/assets/js/cartFunctions.js"></script>
    <script type="module" src="./src/assets/js/main.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <script type="module" src="./src/assets/js/forms.js"></script>
</body>

</html>