<?php
session_start();
require_once 'connect.php';

if( !empty($_SESSION['user']['avatar'])){
    unlink($_SESSION['user']['avatar']) ;
}
$id=$_SESSION['user']['id'];
$image=$_FILES["avatar"];
//Загрузка одного файла______________
$types=["image/jpeg","image/png"];
if (!in_array($image["type"],$types)){
    die('Incorrect file type');
}
$extension = pathinfo($image["name"], PATHINFO_EXTENSION);
$filename=time().".$extension";
$fail="../uploads/ava/".$filename;
move_uploaded_file($image["tmp_name"],$fail);
mysqli_query($connect,"UPDATE `users` SET `avatar`='$fail' WHERE `users`.`id`='$id'");
$_SESSION['user'] = [
    "id" => $_SESSION['user']['id'],
    "full_name" => $_SESSION['user']['full_name'],
    "avatar" => $fail,
    "stah" => $_SESSION['user']['stah'],
    "dolchnost" => $_SESSION['user']['dolchnost'],
    "telephone" => $_SESSION['user']['telephone'],
    "disciplin" => $_SESSION['user']['disciplin'],
    "its_mi" => $_SESSION['user']['its_mi']
];
header('Location: ../profile_glav.php');
?>