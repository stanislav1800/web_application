<?php

session_start();
require_once 'connect.php';

//получаем данные через $_POST
if (isset($_POST['search'])) {
    // никогда не доверяйте входящим данным! Фильтруйте всё!
    $word = $_POST['search'];
    //echo $word;
    // Строим запрос
    $sql=mysqli_query($connect,"SELECT * FROM `users` WHERE `full_name` LIKE '%$word%' AND `dolchnost` = 'Преподователь' ");

//    $sql = mysqli_query($connect,"SELECT `id`,`full_name` FROM `users` WHERE `full_name` LIKE '%  $word  %' ORDER BY `id` LIMIT 10");
//    echo $sql;
    $sql=mysqli_fetch_all($sql);
    // Получаем результаты
    $_SESSION['poisc']=$sql;
    //echo $sql;
    header('Location: ../personal_pages.php');
} else{
        echo '<li>По вашему запросу ничего не найдено</li>';
    }

?>