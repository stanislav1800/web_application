<?php
session_start();

if ($_SESSION['user']) {
    header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="shortcut icon" href="/uploads/avatar.png" type="image/png">
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
    <!-- Форма авторизации -->
<div class="container1">
<div class="connect">
    <h1>Авторизация</h1>
    <form action="vendor/signin.php" method="post">
        <label>Логин</label>
        <input class="inp" type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input class="inp" type="password" name="password" placeholder="Введите пароль">
        <p><button type="submit" class="login-btn">Войти</button></p>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
        </p>
        <?php if ($_SESSION['message']){
            echo '<p class="msg">'.$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
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
</html>