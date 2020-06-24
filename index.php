<!doctype html>
<html leng="EN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewer.css?<?php echo time();?>">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
<body>
    <header>
        <div class="special"><img src="logo.png" height="50px"></div>
        <div>Группа 191-321, Павлова Наталья</div>
    </header>
    <main>
        <h1>Лабораторная № 9</h1>
        <?php
        //импортируем модули
        require 'menu.php'; // главное меню
        // модули с контентом страницы
        if( $_GET['p'] == 'viewer' ){ // если выбран пункт меню "Просмотр"
            include 'viewer.php'; // подключаем модуль с библиотекой функций
            // если в параметрах не указана текущая страница – выводим самую первую
            if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0;
            // если в параметрах не указан тип сортировки или он недопустим
            if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&
            $_GET['sort']!='date'))
            $_GET['sort']='byid'; // устанавливаем сортировку по умолчанию
            // формируем контент страницы с помощью функции и выводим его
            echo getContactList($_GET['sort'], $_GET['pg']);
        }
        else
        if( $_GET['p'] == 'add' ){
            include 'add.php';
        } else
            if( $_GET['p'] == 'edit' ){
                include 'edit.php';
            } else
                if( $_GET['p'] == 'delete' ){
                    include 'delete.php';
                    }
        ?>
    </main>
</body>

</html>