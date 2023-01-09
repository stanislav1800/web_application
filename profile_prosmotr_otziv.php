<?php
session_start();
require_once 'vendor/connect.php';
$product_id=$_GET['id'];
$product=mysqli_query($connect,"SELECT * FROM `users` WHERE `id`='$product_id'");
$product=mysqli_fetch_assoc($product);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вопросы</title>
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
                <div class="photo">
                    <?php if( !empty($product['avatar'])  ) {?>
                        <img width="200px" src="<?= $product['avatar'] ?>" alt="">
                    <?php }else { ?>
                        <img width="200px" src="uploads/unknov.png" alt="">
                    <?php } ?>
                </div>
                <ul class="ulli">
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_prosmotr_glav.php?id=<?=$product['id'] ?>">Данные преподавателя</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_prosmotr_galery.php?id=<?=$product['id'] ?>">
                            <i class="fa fa-picture-o"></i>
                            Фотогалерея									</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="profile_prosmotr_dokuments.php?id=<?=$product['id'] ?>">
                            <i class="fa fa-file-text"></i>
                            Учебно-методические материалы									</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="profile_prosmotr_otziv.php?id=<?=$product['id'] ?>" style="color: white" >
                            <i class="fa fa-user-o"></i>
                            Вопросы к преподавателю									</a>
                    </li>
                </ul>
            </div></div>
        <div class="col-md-9">
            <div class="profile-body">
                <h1>Вопросы:</h1>
                    <?php
                    require_once 'vendor/connect.php';
                    $id=$product['id'];
                    $comments=mysqli_query($connect,"SELECT * FROM `komments` WHERE `users_k_id`='$id'");
                    $comments=mysqli_fetch_all($comments);
                    foreach($comments as $comment){
                    ?>
                        <div class="coment">
                            <p><strong><?= $comment[1] ?></strong></p>
                            <?= $comment[3] ?>
                        </div>
                        <?php
                        $id=$comment[0];
                        $comments1=mysqli_query($connect,"SELECT * FROM `otvet` WHERE `users_k_id`='$id'");
                        $comments1=mysqli_fetch_all($comments1);
                        foreach($comments1 as $comment1){
                            ?>
                            <div style="margin: 20px" class="coment">
                                <p><strong><?= $comment1[1] ?></strong></p>
                                <?= $comment1[3] ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        }
                        ?>
                <form action="vendor/add_comment.php" method="post">
                    <h2>Оставить вопрос:</h2>
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <textarea name="koment"></textarea>
                    <button type="submit">Добавить Коментарий</button>
                    <?php if ($_SESSION['message']){
                        echo '<p class="msg">'.$_SESSION['message'].'</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
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