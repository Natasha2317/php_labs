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
    <div class="add">
        <fieldset>
            <legend> Новая запись </legend>
            <form name="form_add" method="post" action="?p=add">
                <label for="fam">Фамилия* </label>
                <input type="text" name="fam" id="fam" required autofocus><br>
                <label for="name">Имя*</label>
                <input type="text" name="name" id="name" required><br>
                <label for="otchestvo">Отчество</label>
                <input type="text" name="otchestvo" id="otchestvo"><br>
                <label for="pol">Пол</label><br>
                <input type="radio" name="pol" value="м" checked> м<br>
                <input type="radio" name="pol" value="ж"> ж<br>
                <label for="date_of">Дата рожд.</label>
                <input type="date" name="date_birthday" id="date_of"><br>
                <label for="address">Адрес</label>
                <input type="text" name="address" id="address"><br>
                <label for="phone">Телефон*</label>
                <input type="tel" name="phone" id="phone" required><br>
                <label for="email">Эл. почта*</label>
                <input type="email" name="email" id="email" required><br>
                <textarea class="com" name="comment" placeholder="комменатрий"></textarea><br>
                <input type="submit" name="button" value="Добавить запись">
            </form>
        </fieldset>
    </div>
<?php
    // если были переданы данные для добавления в БД
    if( isset($_POST['button']) && $_POST['button'] == 'Добавить запись'){
        $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');
        if (mysqli_connect_error()){
            prinf("Соединение не установлено", mysqli_connect_error());
            exit();
        }

        // формируем и выполняем SQL-запрос для добавления записи

        $fam = htmlspecialchars($_POST['fam'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $otchestvo = htmlspecialchars($_POST['otchestvo'], ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
        $pol = $_POST['pol'];
        $date_birthday = $_POST['date_birthday'];
        $phone = $_POST['phone'];

        $query = "INSERT INTO contacts VALUES (NULL, '$fam', '$name', '$otchestvo', '$pol', '$date_birthday', '$phone', '$address', '$email', '$comment') ";
        $mysqli->query($query);
        // если при выполнении запроса произошла ошибка – выводим сообщение
        if (!$query)
            echo '<div class="error">Запись не добавлена</div>';
        else // если все прошло нормально – выводим сообщение
            echo '<div class="ok">Запись успешно добавлена</div>';

        $url = 'http://localhost/php1/laba9/add.php';
        header("Location: $url");
        mysqli_close($mysqli);
    }
?>