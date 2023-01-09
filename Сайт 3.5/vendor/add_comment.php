<?php
session_start();
require_once 'connect.php';
$id_k=$_POST['id'];
if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
$name=$_SESSION['user']['full_name'];
$koment=$_POST['koment'];
    mysqli_query($connect, "INSERT INTO `komments` (`id`, `users_name`,`users_k_id`, `koment`) VALUES (NULL,'$name' , '$id_k', '$koment')");
    header('Location: /profile_prosmotr_otziv.php?id='.$id_k);
}else{
    $_SESSION['message']='Неавторизированные пользователи не могут оставлять комментарии!';
    header('Location: /profile_prosmotr_otziv.php?id='.$id_k);
}
?>