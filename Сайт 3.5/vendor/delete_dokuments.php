<?php
session_start();
require_once 'connect.php';

$id=$_GET['id'];
$filename = $_GET['dokyments'];
unlink($filename) ;
mysqli_query($connect,"DELETE FROM `dokyments` WHERE `dokyments`.`id` = '$id'");
header('Location: ../profile_dokuments.php');
?>