<?php
include('./dblink.php');

$login = trim($_POST['login']);
$pass = trim($_POST['pass']);

$query = "SELECT * FROM Users WHERE UserLogin = '$login'";
$result = mysqli_query($link, $query);
$userData = mysqli_fetch_array($result);

if (empty($userData) || $pass != $userData['UsersPassword']) {
    echo json_encode([
        'err' => "Неверный логин или пароль!"
    ]);
    return;
} else {
    setcookie("userId", $userData['idUsers'], time() + (3600 * 24 * 3), "/", '.clotheslina');
    echo json_encode([
        'success' => "Вы успешно авторизовались!",
    ]);
    return;
}
?>
