<?php
session_start();
require_once 'connect.php';

$id=$_GET['id'];
$filename = $_GET['fail'];
unlink($filename) ;
mysqli_query($connect,"DELETE FROM `galery` WHERE `galery`.`id` = '$id'");
header('Location: ../profile_galery.php');
?>