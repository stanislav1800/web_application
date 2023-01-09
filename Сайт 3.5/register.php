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
    <title>Регистрация</title>
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

    <!-- Форма регистрации -->
<div class="container1">
<div class="connect">
    <h1>Регистрация</h1>
    <form action="vendor/signup.php" method="post" >
        <p>Логин<strong>*</strong></p>
        <input class="inp" type="text" name="login" placeholder="Введите свой логин">
        <p>Пароль<strong>*</strong></p>
        <input class="inp" type="password" name="password" placeholder="Введите пароль">
        <p>Подтверждение пароля<strong>*</strong></p>
        <input class="inp" type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <p>Введите ФИО:<strong>*</strong></p>
        <input class="inp" tupe="text" name="full_name" placeholder="Введите ФИО">
        <p>Стаж работы:</p>
        <input class="inp" tupe="text" name="stah" placeholder=" Введите стаж работы">
        <p>Телефон учреждения:</p>
        <input class="inp" tupe="text" name="telephone" placeholder="Введите телефон">
        <p>Должность:<strong>*</strong></p>
        <select class="inp" name="dolchnost">
            <option value="0" selected>Выберите</option>
            <option value="Преподаватель">Преподаватель</option>
            <option value="Студент">Студент</option>
        </select>
        <p>Преподаваемая дисциплина:</p>
        <input class="inp" tupe="text" name="disciplin" placeholder="Введите дисциплину">
        <p>О себе:</p>
        <input class="inp" tupe="text" name="its_mi" placeholder="Расскажите о себе">
        <p><button type="submit" class="register-btn">Зарегистрироваться</button></p>
        <p>
            У вас уже есть аккаунт? - <a href="/auto.php">авторизируйтесь</a>!
        </p>
        <?php if ($_SESSION['message']){
            echo '<p class="msg">'.$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
        ?>
        <p></p>
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