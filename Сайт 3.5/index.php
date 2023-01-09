<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="shortcut icon" href="/uploads/avatar.png" type="image/png">
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
<div style="padding-bottom: 40px; padding: 20px;" class="container1">
    <h1 style="text-align: center; margin-bottom: 20px">Сайт представляет собой личные кабинеты преподавателей информатики </h1>
    <p><strong>Преподаватель информационных технологий</strong> – это педагог, чья деятельность направлена на формирование у обучающихся знаний в области совокупных методов и способов получения, обработки, представления информации, направленных на изменение ее состояния, свойств, формы, содержания и осуществляемых в интересах пользователей.</p>
    <p>Преподаватели цикловой комиссии осуществляет подготовку по специальности "Программирование в компьютерных системах"</p>
<img align="left" style="margin: 10px; margin-right:20px;height: 200px;border: 3px solid #00a8e1" src="/uploads/pictures/4.jpg">

    <h4>В результате деятельности преподавателя информационных технологий студенты должны:</h4>
    <ul>
        <li>знать базовые информационные процессы, структуру, модели, методы и средства базовых и прикладных информационных технологий, методику создания, проектирования и сопровождения систем на базе информационных технологий;</li>
        <li>уметь применять информационные технологии при решении функциональных задач в различных предметных областях, а также при разработке и проектировании информационных систем;</li>
        <li>иметь представление об областях применения информационных технологий и их перспективах.</li>
    </ul>
    <p>В процессе обучения студенты овладевают знаниями в области совокупности методов и средств для разработки, сопровождения и эксплуатации программного обеспечения компьютерных систем</p>
    <img align="right" style="margin-right: 10px" src="/uploads/pictures/2.png"> <h4 style="padding-top: 20px">Виды деятельности программиста: </h4>
                <ul>
                    <li>разработка комплекса алгоритмов (проектирование);</li>
                    <li>кодирование и компиляция (написание исходного текста программы и преобразование его в исполнимый код с помощью компилятора);</li>
                    <li>сопровождение программного обеспечения;</li>
                    <li>тестирование и отладка программ.</li>
                </ul>
    <p>Обучающиеся осваивают общеобразовательные и профессиональные дисциплины и модули, выполняют задания учебной и производственной практики</p>
    <img align="left" style="margin: 10px; margin-right:20px " src="/uploads/pictures/3.png">
                <h4>Места работы: </h4>
                    <ul>
                    <li>IT-компании;</li>
                    <li>организации, которые в своей структуре имеют IT-отделы.</li>
                    </ul>

                <h4>Профессиональные навыки: </h4>
                <ul>
                    <li>владение одним или несколькими языками программирования (C++, C#, Delphi, PHP и др.);</li>
                    <li>знание технического английского языка.</li>
                </ul>

<p style="padding-top: 30px">В настоящее время информация и знания являются основой экономического и социального прогресса, важнейшим стратегическим ресурсом. Процесс поиска, переработки информации и получения на их основе новых знаний бесконечен и неисчерпаем.</p>
<!--    <img align="left" style="margin: 10px; margin-right:20px " src="/uploads/pictures/1.png">-->


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