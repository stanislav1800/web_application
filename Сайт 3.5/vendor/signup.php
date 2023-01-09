<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$full_name=$_POST['full_name'];/**/
$stah=$_POST['stah'];
$telephone=$_POST['telephone'];
$dolchnost=$_POST['dolchnost'];/**/
$disciplin=$_POST['disciplin'];
$its_mi=$_POST['its_mi'];

if($full_name===''||$dolchnost==='0'||$password===''||$password_confirm===''||$login==='' ){
    $_SESSION['message']='Заполните все поля помеченные *.';
    header('Location: ../register.php');
    die();
}
    if ($password === $password_confirm) {
        $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_login) > 0) {
            $_SESSION['message']='Такой логин существует';
            header('Location: ../register.php');
            die();
        }
        $password = md5($password);
        mysqli_query($connect,"INSERT INTO `users` (`id`, `login`, `password`, `full_name`, `stah`, `dolchnost`, `telephone`, `disciplin`, `its_mi`) VALUES (NULL,'$login','$password','$full_name','$stah','$dolchnost','$telephone','$disciplin','$its_mi')");
        $_SESSION['message']='Регистрация прошла успешно';
        header('Location: ../auto.php');
    } else {
        $_SESSION['message']='Пароли не совподают';
        header('Location: ../register.php');
    }
?>
