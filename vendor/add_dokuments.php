<?php
session_start();
require_once 'connect.php';
if(isset($_FILES)) {
    $allowedTypes = array('image/jpeg','image/png','image/gif');
    $uploadDir = "../uploads/doc/"; //Директория загрузки. Если она не существует, обработчик не сможет загрузить файлы и выдаст ошибку
    for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $name=basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
        $check_doc = mysqli_query($connect, "SELECT * FROM `dokyments` WHERE `name` = '$name'");
        if (mysqli_num_rows($check_doc) > 0) {
            $name=time().basename($_FILES['file']['name'][$i]);
            $uploadFile[$i]=$uploadDir.$name;
        }
        $id=$_SESSION['user']['id'];
        $fails=$uploadFile[$i];
        mysqli_query($connect,"INSERT INTO `dokyments` (`id`, `users_id`, `dokyments`,`name`) VALUES (NULL, '$id', '$fails','$name')");
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
                header('Location: ../profile_dokuments.php');
            } else {
                //echo "Ошибка ".$_FILES['file']['error'][$i]."<br>";
            }
    }
} else{
    //echo "Вы не прислали файл!" ;
}
?>