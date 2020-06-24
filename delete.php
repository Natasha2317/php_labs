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
        <h1>Удаление записей</h1>
<?php
    $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');
    if( mysqli_connect_errno() ) // проверяем корректность подключения
       echo 'Ошибка подключения к БД: '.mysqli_connect_error();

    // если были переданы данные для удаления записи в таблице
    if( isset($_GET['id']) && $_GET['p'] == 'delete')
    {
        // формируем и выполняем SQL-запрос на удаление записи с указанным id
        $sql_res=mysqli_query($mysqli, "DELETE FROM contacts WHERE id_human=".$_GET['id']);
        echo '<div class="ok in-delete">Запись успешно удалена</div>'; // и выводим сообщение об удалении данных
    }

    // формируем и выполняем запрос для получения требуемых полей всех записей таблицы
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM contacts');
    if($sql_res) // если запрос успешно выполнен
    {
        echo '<div id="delete_links">';
        while( $row=mysqli_fetch_row($sql_res) ) // перебираем все записи и добавялем к ним "кнопку" удаления
        {
                // формируем список ссылок
                echo '<a class="delete_button" href="?p=delete&id='.$row[0].'">Удалить</a>'.$row[0].' | '.$row[1].' | '.$row[2].' | '.$row[3].' | '.$row[4].' | '.$row[5].' | '.$row[6].' | '.$row[7].' | '.$row[8].' | '.$row[9].'<br>';
        }
        echo '</div>';
        mysqli_close($mysqli);
    }
    else // если запрос не может быть выполнен
    echo 'Ошибка базы данных';// выводим сообщение об ошибке

    echo '</main>
        </body>
        </html>';
?>