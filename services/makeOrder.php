<?php
include('./dblink.php');

$userId = $_COOKIE['user'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$reciever = $_POST['reciever'];
$totalPrice = $_POST['totalPrice'];
$items = $_POST['items'];
$orderQuery = "INSERT INTO orders (`OrdersPrice`, `OrdersAddress`, `OrdersReciever`, `OrdersPhone`, `Users_idUsers`) VALUES ('$totalPrice', '$address', '$reciever', '$phone', '$userId')";
$ordersResult = mysqli_query($link, $orderQuery);

$newOrderQuery = "SELECT idOrders FROM orders ORDER BY idOrders DESC LIMIT 1";
$newOrderResult = mysqli_query($link, $newOrderQuery);
$newOrderFetch = mysqli_fetch_array($newOrderResult);
$newOrderId = $newOrderFetch['idOrders'];

foreach($items as $value) {

    $itemId = $value['id'];
    $itemCount = $value['quantity'];
    $totalItemPrice = intval($value['quantity']) * intval($value['price']);
    $orderDetailsQuery = "INSERT INTO orders_has_items (`Orders_idOrders`, `Items_idItems`, `ItemsCount`, `ItemsTotalPrice`) VALUES ('$newOrderId', '$itemId', '$itemCount', '$totalItemPrice')";
    $orderDetailtResult = mysqli_query($link, $orderDetailsQuery);
};

echo json_encode([
    'success' => "Заказ успешно зарегистрирован!",
]);
return;
?>
