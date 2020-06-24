'<!doctype html>
<html leng="EN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewer.css?<?php echo time();?>">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <header>
        <div class="special"><img src="logo.png" height="50px"></div>
        <div>Группа 191-321, Павлова Наталья</div>
    </header>
    <main>
    <?php
    $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');
        if( mysqli_connect_errno() ) // проверяем корректность подключения
        echo 'Ошибка подключения к БД: '.mysqli_connect_error();

    // если были переданы данные для изменения записи в таблице
    if( isset($_POST['button']) && $_POST['button']== 'Изменить запись')
    {
        // формируем и выполняем SQL-запрос на изменение записи с указанным id
        $query=mysqli_query($mysqli, "UPDATE contacts SET name='".
        htmlspecialchars($_POST['name'])."', fam='".
        htmlspecialchars($_POST['fam'])."', otchestvo='".
        htmlspecialchars($_POST['otchestvo'])."', pol='".
        htmlspecialchars($_POST['pol'])."', date_birthday='".
        htmlspecialchars($_POST['date_birthday'])."', address='".
        htmlspecialchars($_POST['address'])."', phone='".
        htmlspecialchars($_POST['phone'])."', email='".
        htmlspecialchars($_POST['email'])."', comment='".
        htmlspecialchars($_POST['comment'])."'
        WHERE id_human=".$_GET['id']);
        echo '<div class="ok in-edit">Данные изменены</div>'; // и выводим сообщение об изменении данных
    }

    $currentROW=array(); // информации о текущей записи пока нет
    // если id текущей записи передано –
    if( isset($_GET['id']) ) // (переход по ссылке или отправка формы)
    {
        // выполняем поиск записи по ее id
        $query=mysqli_query($mysqli,
        'SELECT * FROM contacts WHERE id_human='.$_GET['id'].' LIMIT 1');
        $currentROW=mysqli_fetch_row($query); // информация сохраняется
    }
    if( !$currentROW ) // если информации о текущей записи нет или она некорректна
    {
        // берем первую запись из таблицы и делаем ее текущей
        $query=mysqli_query($mysqli, 'SELECT * FROM contacts LIMIT 1');
        $currentROW=mysqli_fetch_row($query);
    }
    // формируем и выполняем запрос для получения требуемых полей всех записей таблицы
    $query=mysqli_query($mysqli, 'SELECT * FROM contacts');
    if($query) // если запрос успешно выполнен
    {
        echo '<div id="edit_links">';
        while( $row=mysqli_fetch_row($query) ) // перебираем все записи выборки
        {
            // если текущая запись пока не найдена и её id не передан
            // или передан и совпадает с проверяемой записью
            if($currentROW[0]==$row[0])
                // значит в цикле сейчас текущая запись
                echo '<div>'.$row[0].' | '.$row[1].' | '.$row[2].' | '.$row[3].' | '.$row[4].' | '.$row[5].' | '.$row[6].' | '.$row[7].' | '.$row[8].' | '.$row[9].'</div>'; // и выводим её в списке
            else // если проверяемая в цикле запись не текущая
                // формируем ссылку на неё
                echo '<a href="?p=edit&id='.$row[0].'">'.$row[0].' | '.$row[1].' | '.$row[2].' | '.$row[3].' | '.$row[4].' | '.$row[5].' | '.$row[6].' | '.$row[7].' | '.$row[8].' | '.$row[9].'</a><br>';
        }
        echo '</div>';
        // вспомогательные для выбора пола переменные
        $male = FALSE;
        $female = FALSE;
        if ($currentROW[4] == 'м')
            $male = TRUE;
        else $female = TRUE;

        if( $currentROW ) // если есть текущая запись, т.е. если в таблице есть записи
        {
            // формируем HTML-код формы
            echo '<div class="edit_form">
            <fieldset>
        <legend> Изменить запись </legend>
            <form name="form_edit" method="post" action="?p=edit&id='.$currentROW[0].'">
            <label for="fam">Фамилия* </label>
            <input type="text" name="fam" id="fam" value="'.
            $currentROW[1].'" required autofocus>
            <label for="name">Имя*</label>
            <input type="text" name="name" id="name" value="'.
            $currentROW[2].'" required>
            <label for="otchestvo">Отчество</label>
            <input type="text" name="otchestvo" id="otchestvo" value="'.
            $currentROW[3].'"><br>
            <label for="pol">Пол</label>
            <input type="radio" name="pol" value="м"'. (($male) ? 'checked' : ' ').'> м
            <input type="radio" name="pol" value="ж"'. (($female) ? 'checked' : ' ').'> ж
            <label for="date_birthday">Дата рождения</label>
            <input type="date" name="date_birthday" id="date_birthday" value="'.
            $currentROW[5].'"><br>
            <label for="address">Адрес</label>
            <input type="text" name="address" id="address" value="'.
            $currentROW[6].'"><br>
            <label for="phone">Телефон*</label>
            <input type="tel" name="phone" id="phone" required value="'.
            $currentROW[7].'">
            <label for="email">Эл. почта*</label>
            <input type="email" name="email" id="email" required value="'.
            $currentROW[8].'"><br>
            <textarea class="com" name="comment" placeholder="Краткий комментарий, если есть">'.
            $currentROW[9].'</textarea><br>
            <input type="submit" name="button"
            value="Изменить запись"></form></fieldset></div>';
        }
        else echo 'Записей пока нет';
        mysqli_close($mysqli);
    }
    else // если запрос не может быть выполнен
        echo 'Ошибка базы данных'; // выводим сообщение об ошибке
?>