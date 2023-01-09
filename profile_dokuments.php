<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Учебно-методические материалы</title>
    <link rel="shortcut icon" href="/uploads/avatar.png" type="image/png">
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/glav.css">
</head>
<body>
<ul class="menu">
    <li><h3>Сайт преподавателя</h3></li>
    <li><a href="/">Главная </a></li>
    <li><a href="personal_pages.php">Персональные страницы </a></li>
    <?php
    if( isset($_SESSION['user']) && !empty($_SESSION['user']) )
    {
        ?>
        <?php if( !empty($_SESSION['user']['avatar'])  ) {?>
        <div class="avatar"><a href="profile_glav.php"><img name="avatar" class="avatar" src="<?= $_SESSION['user']['avatar'] ?>" alt=""></a></div>
    <?php }else { ?>
        <div  class="avatar"><a href="profile_glav.php"><img name="avatar" class="avatar" src="uploads/unknov.png" alt=""></a></div>
    <?php } ?>
    <?php }else{ ?>
        <div class="registr"><a href="register.php" >Регистрация</a>
            <a  href="auto.php" >Авторизация</a></div>
    <?php } ?>
</ul>
<div class="container1">
    <div class="row">
        <div class="col-md-3 md-margin-bottom-40">
            <div class="content_left">
                <form  action="vendor/update_foto.php" method="post" enctype="multipart/form-data">
                    <div class="photo">
                        <?php if( !empty($_SESSION['user']['avatar'])  ) {?>
                            <img width="200px" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                        <?php }else { ?>
                            <img width="200px" src="uploads/unknov.png" alt="">
                        <?php } ?>
                    </div>
                    <p></p>
                    <p><input type="file" name="avatar"></p>
                    <p><button type="submit">Изменить аватарку</button></p>
                </form>
                <ul class="ulli">
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_glav.php">Данные преподавателя</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_galery.php">
                            <i class="fa fa-picture-o"></i>
                            Фотогалерея									</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="profile_dokuments.php" style="color: white ">
                            <i class="fa fa-file-text"></i>
                            Учебно-методические материалы									</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_otziv.php">
                            <i class="fa fa-user-o"></i>
                            Вопросы к преподавателю									</a>
                    </li>
                    <il class="list-group-item list-group-item-action list-group-item-dark"><a href="vendor/logout.php" class="logout">Выход</a></il>
                    <li class="list-group-item list-group-item-action list-group-item-dark"><a href="vendor/delet.php" class="logout">Удалить акаунт</a></li>
                </ul>
            </div></div>
        <div class="col-md-9">
            <div class="profile-body">
                <table>
                    <tr>
                        <th> <h1>Документы:</h1></th>
                    </tr>
                    <?php
                    require_once 'vendor/connect.php';
                    $id=$_SESSION['user']['id'];
                    $products=mysqli_query($connect, "SELECT * FROM `dokyments` WHERE `users_id` = '$id'");
                    $products=mysqli_fetch_all($products);
                    foreach ($products as $product){
                        ?>
                        <tr>
                            <th><a href="<?=$product[2] ?>" download><?=$product[3] ?></a></th>
                            <th><a href="vendor/delete_dokuments.php?id=<?=$product[0] ?>&dokyments=<?=$product[2] ?>" >Удалить</a></th>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <form id="myform" class="galery" action="vendor/add_dokuments.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                    <input type='file' name='file[]' class='file-drop' id='file-drop' multiple required>
                    <br>
                    <input type='submit' value='Загрузить' >
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 md-margin-bottom-40">
                <h2>О проекте</h2>
                <p>Преподаватели цикловой комиссии на персональных страницах предоставляют студентам учебно-методические материалы для изучения учебных курсов, а также консультационные возможности на форуме</p>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <h2>Навигация</h2>
                <ul class="list-unstyled link-list">
                    <li><a href="/">Главная</a><i class="fa fa-angle-right"></i></li>
                    <li><a href="personal_pages.php">Педагоги</a><i class="fa fa-angle-right"></i></li>
                </ul>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <h2>Правовая информация</h2>
                <p>Авторские права на материалы, опубликованные на сайте, принадлежат зарегистрированным пользователям, если не указано иное.</p>
            </div>
        </div>
    </div>
</div>
</body>