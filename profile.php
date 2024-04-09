<?php
include("./services/dblink.php");
session_start();
$userId = $_COOKIE['user'];
if(!$userId) {
    header("location: /signin.php");
}
$query = "SELECT * FROM Users WHERE idUsers = '$userId'";
$result = mysqli_query($link, $query);
$userInfo = mysqli_fetch_array($result);
$ordersQuery = "SELECT * FROM Orders WHERE Users_idUsers = $userId";
$ordersResult = mysqli_query($link, $ordersQuery);
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
            <h2 class="heading">Профиль</h2>
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
                <div class="profile__orders">
                    <h3 class="page-subtitle">
                        Ваши заказы
                    </h3>
                    <?php
                        echo '<ul class="profile__order__list">';
                            
                            $prevOrder = null;
                            while($order = mysqli_fetch_array($ordersResult)) {
                                if ($order == $prevOrder) {
                                    continue;
                                }
                                $prevOrder = $order;
                                echo '
                                    <li class="profile__order__item">
                                        <div class="profile__order__header">
                                            <p class="profile__order__header__item">Заказ: '.$order['idOrders'].'</p>
                                            <p class="profile__order__header__item">Адресат: '.$order['OrdersReciever'].'</p>
                                            <p class="profile__order__header__item">Телефон: '.$order['OrdersPhone'].'</p>
                                            <p class="profile__order__header__item">Адрес: '.$order['OrdersAddress'].'</p>
                                            <button data-opened="false" class="menu-arrow-btn">
                                                <img src="./src/assets/img/logos/arrow.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="profile__order__item__details" data-opened="false">
                                            <div class="profile__order__item__details__list">
                                            ';
                                            $orderId = $order['idOrders'];
                                            $orderDetailsQuery = "SELECT * FROM orders_has_items INNER JOIN Items ON orders_has_items.Items_idItems = Items.idItems WHERE Orders_idOrders = $orderId";
                                            $orderDetailsResult = mysqli_query($link, $orderDetailsQuery);
                                            while($orderDetail = mysqli_fetch_array($orderDetailsResult)){
                                                echo '
                                                    <div class="profile__order__item__details__item">
                                                        <img src="./src/assets/img/catalogue/'.$orderDetail['ItemsImg'].'" alt="" class="profile__order__item__details__img">
                                                        <p class="profile__order__item__details__text">'.$orderDetail['ItemsName'].'</p>
                                                        <p class="profile__order__item__details__text profile__order__item__details__text_margin">'.$orderDetail['ItemsCount'].' шт</p>
                                                        <p class="profile__order__item__details__text ">'.$orderDetail['ItemsTotalPrice'].' руб.</p>
                                                    </div>
                                                ';
                                            }
                                            echo '
                                            <p class="profile__order__totalPrice">Итого: '.$order['OrdersPrice'].' руб.</p>
                                        </div>
                                    </div>
                                </li>
                                            
                                            ';
                                
                            }
                        echo '</ul>';
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
    <script type="module" src="./src/assets/js/cartFunctions.js"></script>
    <script type="module" src="./src/assets/js/main.js"></script>
    <script type="module" src="./src/assets/js/dropdown.js"></script>
</body>

</html>