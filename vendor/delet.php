<?php
session_start();
require_once 'connect.php';

$id=$_SESSION['user']['id'];
$products=mysqli_query($connect, "SELECT * FROM `dokyments` WHERE `users_id` = '$id'");
$products=mysqli_fetch_all($products);
foreach ($products as $product){
    unlink($product[2]) ;
}
$products=mysqli_query($connect, "SELECT * FROM `galery` WHERE `id_users` = '$id'");
$products=mysqli_fetch_all($products);
foreach ($products as $product){
    unlink($product[2]) ;
}
unlink($_SESSION['user']['avatar']) ;
mysqli_query($connect,"DELETE FROM `users` WHERE `users`.`id`='$id'");
unset($_SESSION['user']);
header('Location: ../');
?>