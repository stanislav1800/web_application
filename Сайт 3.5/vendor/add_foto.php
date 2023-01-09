<?php
session_start();
require_once 'connect.php';

if(isset($_FILES)) {
    $allowedTypes = array('image/jpeg','image/png','image/gif');
    $uploadDir = "../uploads/galery/"; //Директория загрузки. Если она не существует, обработчик не сможет загрузить файлы и выдаст ошибку
    for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
        for($j = 0; $j < count($allowedTypes); $j++) { //Проверяем на соответствие допустимым форматам
            if($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
                $fileChecked[$i] = true;
                break;
            }
        }
        $fails=$uploadFile[$i];
        $check_foto = mysqli_query($connect, "SELECT * FROM `galery` WHERE `fail` = '$fails'");
        if (mysqli_num_rows($check_foto) > 0) {
            $fails=$uploadDir .time(). basename($_FILES['file']['name'][$i]);
        }
        $id=$_SESSION['user']['id'];
        mysqli_query($connect,"INSERT INTO `galery` (`id`, `id_users`, `fail`) VALUES (NULL, '$id', '$fails')");
        if($fileChecked[$i]) { //Если формат допустим, перемещаем файл по указанному адресу
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $fails)) {
                header('Location: ../profile_galery.php');
            } else {
                //echo "Ошибка ".$_FILES['file']['error'][$i]."<br>";
            }
        } else {
            //echo "Недопустимый формат <br>";
        }
    }
} else {
    //echo "Вы не прислали файл!" ;
}
?>

