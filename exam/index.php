<!doctype html>
<html leng="EN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
  	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <header>
    </header>
    <main>
    <div class="form">
    <h3>Вход для администратора</h3>
        <form action="" method="post">
        <div class="form__name">
            <label for="password">Пароль</label>
            <input type="text" name="password" id="password" placeholder="Введите пароль"><br>
        </div>
        <div class="form__name_button">
            <input type="submit" value="Войти" class="form__button">
        </div>
        </form>
    </div>
    <?php

    if (isset($_POST['password'])){

        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

        if ($password == '12345'){
        $url = 'http://localhost/exam/create.php';

        header("Location: $url");
        }
        else echo'Неверный пароль!';
    }
    ?>
    </main>
</body>
</html>
