
<!doctype html>
<html leng="EN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="viewer.css?<?php echo time();?>">
      <link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <main>
<?php
    function getContactList($type, $page)
        { // осуществляем подключение к базе данных
        global $mysqli;

        // Параметры для подключения
        $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');

        if (mysqli_connect_error()){
            prinf("Соединение не установлено", mysqli_connect_error());
            exit();
        }

        $query=mysqli_query($mysqli, "SELECT COUNT(*) FROM contacts"); //проверяем корректность выполнения запроса и определяем его результат
        if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($query))
            {
                $TOTAL=$row[0];
                if(!$TOTAL) // если в таблице нет записей
                    return 'В таблице нет данных' ; // возвращаем сообщение
                $PAGES = ceil($TOTAL/10); // вычисляем общее количество страниц
                if( $page>=$TOTAL ) // если указана страница больше максимальной
                    $page=$TOTAL-1; // будем выводить последнюю страницу
                // формируем и выполняем SQL-запрос для выборки записей из БД
                switch ($type) {
                    case 'byid':
                        $sql="SELECT * FROM contacts LIMIT ".($page * 10).", 10";
                        break;
                    case 'fam':
                        $sql="SELECT * FROM contacts ORDER BY fam LIMIT ".($page * 10).", 10";
                        break;
                    case 'date':
                        $sql="SELECT * FROM contacts ORDER BY date_birthday LIMIT ".($page * 10).", 10";
                        break;
                    default:
                        echo 'Не указан тип сортировки';
                }

        $query = $mysqli->query('SELECT * FROM contacts');
        $ret.='<table><tr><td>ID</td>
        <td>Фамилия</td>
        <td>Имя</td>
        <td>Отчество</td>
        <td>Пол</td>
        <td>Дата рождения</td>
        <td>Телефон</td>
        <td>Адрес</td>
        <td>Email</td>
        <td>Комментарий</td></tr>';

            while ($row = mysqli_fetch_assoc($query)){
                $ret.='
                <tr><td>'.$row['id_human'].'</td>
                <td>'.$row['fam'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['otсhestvo'].'</td>
                <td>'.$row['pol'].'</td>
                <td>'.$row['date_birthday'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['comment'].'</td></tr>';
            }
            $ret.='</table>';

            if( $PAGES>1 ) // если страниц больше одной – добавляем пагинацию
            {
            $ret.='<div id="pages">'; // блок пагинации
                for($i=0; $i<$PAGES; $i++) // цикл для всех страниц пагинации
                if( $i !=$page ) // если не текущая страница
                    $ret.='<a href="?p=viewer&pg='.$i.'&sort='.$type.'">'.($i+1).'</a>';
                    else // если текущая страница
                    $ret.='<span>'.($i+1).'</span>';
                    $ret.='</div>';
            }
        mysqli_close($mysqli);
    return $ret; // возвращаем сформированный контент
}
// если запрос выполнен некорректно
return '<div class="error">Неизвестная ошибка</div>'; // возвращаем сообщение
}
echo '</main>
</body>
</html>';
?>