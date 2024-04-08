<?php
setcookie("user", $userData['idUsers'], time() - (3600 * 24 * 3), "/", '.clotheslina');
header('location: ../index.php');
exit;