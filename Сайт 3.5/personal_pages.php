<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
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
<div style="text-align: center" class="container1">
    <p>Поиск:</p>
    <form action="vendor/poisc.php" method="post">
    <input  style="width: 50%" autocomplete="off" tupe="text" name="search" >
    <input style="width: 10%" type="submit" value="Поиск"/>
    </form>
<!--    --><?php //if ($_SESSION['poisc']){
//        foreach ($_SESSION['poisc'] as $product){?>
<!--            <p>--><?//=$product[4]?><!--</p>-->
<!--    --><?php
//        }
//    }
//    unset($_SESSION['poisc']);
//    ?>

    <hr>
                <h3>Преподователи</h3>
                <hr>
                <?php
                if ($_SESSION['poisc']){
                    foreach ($_SESSION['poisc'] as $product){?>
                        <div class="pole">
                            <?php if( !empty($product[3])  ) {?>
                                <div class="avatar"><img  name="avatar" class="avatar" src="<?=$product[3] ?>" alt=""></div>
                            <?php }else { ?>
                                <div class="avatar"><img  name="avatar" class="avatar" src="uploads/unknov.png" alt=""></div>
                            <?php } ?>
                            <h1><a style="color: black" href="profile_prosmotr_glav.php?id=<?=$product[0] ?>"><?=$product[4] ?> </a></h1>
                            <p><strong>Преподоваемые дисциплины:</strong><?=$product[8] ?></p>
                        </div>
                        <?php
                    }
                    unset($_SESSION['poisc']);
                } else{
                require_once 'vendor/connect.php';
                $products=mysqli_query($connect,"SELECT * FROM `users` WHERE `dolchnost` = 'Преподователь'");
                $products=mysqli_fetch_all($products);
                foreach ($products as $product){
                    ?>
    <div class="pole">
                    <?php if( !empty($product[3])  ) {?>
                            <div class="avatar"><img  name="avatar" class="avatar" src="<?=$product[3] ?>" alt=""></div>
                    <?php }else { ?>
                        <div class="avatar"><img  name="avatar" class="avatar" src="uploads/unknov.png" alt=""></div>
                    <?php } ?>
        <h1><a style="color: black" href="profile_prosmotr_glav.php?id=<?=$product[0] ?>"><?=$product[4] ?> </a></h1>
        <p><strong>Преподоваемые дисциплины:</strong><?=$product[8] ?></p>
    </div>
                    <?php
                }}
                ?>
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
<style>
    .footer {
        background-color: #030345;
        color: white;
        display: block;
        height: auto;
        left: 0;
        position: absolute;
        width: 100%;
        margin:0 auto;
    }
    .pole{
        position: relative;
        margin-left:10%;
        width: 80%;
        padding:10px;
        border:0;
        box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
        margin-bottom: 10px;
        overflow-x:hidden;
    }
    .pole .avatar {
        vertical-align: middle;
        border-radius: 50%;
        margin: 5px;
        margin-top: 0;
        float: left;
        width: 150px;
        height: 150px;
    }
    .pole .avatar img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

</style>



</body>
</html>