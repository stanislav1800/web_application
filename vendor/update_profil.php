<?php
session_start();
require_once 'connect.php';

$id=$_SESSION['user']['id'];
$full_name=$_POST['full_name'];
$stah=$_POST['stah'];
    $dolchnost=$_POST['dolchnost'];
    $telephone=$_POST['telephone'];
    $disciplin=$_POST['disciplin'];
    $its_mi=$_POST['its_mi'];

mysqli_query($connect,"UPDATE `users` SET `full_name`='$full_name',`stah`='$stah',`dolchnost`='$dolchnost',`telephone`='$telephone',`disciplin`='$disciplin',`its_mi`='$its_mi' WHERE `users`.`id`='$id'");
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$id'");
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
}
header('Location: ../profile_glav.php');
?>