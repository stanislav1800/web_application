<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($password);
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "stah" => $user['stah'],
        "dolchnost" => $user['dolchnost'],
        "telephone" => $user['telephone'],
        "disciplin" => $user['disciplin'],
        "its_mi" => $user['its_mi']
    ];
    header('Location: ../profile_glav.php');
} else {
    $_SESSION['message']='Не верный логин или пароль';
    header('Location: ../auto.php');
}
?>
