<?php

session_start();
require_once 'connect.php';

if (isset($_POST['answer'])) {
    $text = $_POST['answer'];
    $id=$_SESSION['user']['full_name'];
    $id_k=$_POST['id'];
    mysqli_query($connect, "INSERT INTO `otvet` (`id`, `users_name`,`users_k_id`, `text`) VALUES (NULL,'$id' , '$id_k', '$text')");
    header('Location: /profile_otziv.php');
}


