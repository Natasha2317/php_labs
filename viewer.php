<?php

    // Параметры для подключения
    $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');

    if (mysqli_connect_error()){
        prinf("Соединение не установлено", mysqli_connect_error());
        exit();
    }
    $query = $mysqli->query('SELECT * FROM poems');

        while ($row = mysqli_fetch_assoc($query)){
            echo $row['fam'].'<br>'.$row['name'].'<br>'.$row['otсhestvo'].'<br>'.$row['pol'].'<br>'.$row['date_birthday'].'<br>'.$row['phone'].'<br>'.$row['address'].'<br>'.$row['email'].'<br>'.$row['comment'];
        }

    $mysqli->close();

?>
