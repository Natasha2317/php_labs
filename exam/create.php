<!doctype html>
<html leng="EN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="viewer.css?<?php echo time();?>">
  	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <header>
    </header>
    <main>
    <div class="form">
    <h3>Администратор</h3>
    <h4>Мои формы</h4>
    <h4>Создать форму</h4>
    <div class="form">
        <form action="" method="post">
        <div class="form__name">
            <label for="name">Опрос</label>
            <input type="text" name="name_opros" id="name" placeholder="Введите название опроса"><br>
        </div>
        <div class="form__name">
            <input type="text" name="question1" id="question" placeholder="Введите вопрос">
        </div>
        <div class="form__name">
            <input type="text" name="question2" id="question" placeholder="Введите вопрос">
        </div>
        <div class="form__name">
            <input type="text" name="question3" id="question" placeholder="Введите вопрос">
        </div>
        <div class="form__name">
            <input type="text" name="question4" id="question" placeholder="Введите вопрос">
        </div>
        <div class="form__name">
            <input type="text" name="question5" id="question" placeholder="Введите вопрос">
            <p>м<input type="text" name="question5_1" id="question" placeholder="Введите баллы(-100;100)"></p>
            <p>ж<input type="text" name="question5_2" id="question" placeholder="Введите баллы(-100;100)"></p>
        </div>
        <div class="form__name">
            <input type="text" name="question6" id="question" placeholder="Введите вопрос">
        </div>
        <div>

        <?php

        if (isset($_POST['create']) &&( $_POST['create'] == 'Отправить')){
        $name_opros = $_POST['name_opros'];
        $question1 = $_POST['question1'];
        $question2 = $_POST['question2'];
        $question3 = $_POST['question3'];
        $question4 = $_POST['question4'];
        $question5 = $_POST['question5'];
        $question5_1 = $_POST['question5_1'];
        $question5_2 = $_POST['question5_2'];

       $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');

        if (mysqli_connect_error()){
            prinf("Соединение не установлено", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO my_opros1(id, name_opros, question1, question2, question3, question4, question5, question6, question5_1, question5_2)
        VALUES(NULL, '$name_opros','$question1', '$question2', '$question3', '$question4','$question5',
        '$question6', '$question5_1', $question5_2) ";
        $mysqli->query($query);
        $url = 'http://php-labs.std-946.ist.mospolytech.ru/exam/create.php';

        header("Location: $url");

        $mysqli->close();
    }
        ?>
        <div class="form__name_button">
            <button type="submit" name="create" value="Отправить" class="form__button">Отправить</button>
        </div>
    <div class="form__name_button">
            <button type="submit" name="see" value="Посмотреть" class="form__button">Посмотреть мои опросы</button>
    </div>
    </form>
    </div>
    <?php
        if (isset($_POST['see']) &&( $_POST['see'] == 'Посмотреть')){
       $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');

        if (mysqli_connect_error()){
            prinf("Соединение не установлено", mysqli_connect_error());
            exit();
        }

        $query = $mysqli->query('SELECT * FROM my_opros1');
        echo'<table><tr><td>ID</td>
        <td>Название опроса</td>
        <td>Имя пользователя</td>
        <td>Вопрос первого типа</td>
        <td>Вопрос второго типа</td>
        <td>Вопрос третьего типа</td>
        <td>Вопрос четвертого типа</td>
        <td>Вопрос пятого типа</td>
        <td>Баллы за первый вариант</td>
        <td>Баллы за второй вариант</td>
        <td>Вопрос шестого типа</td>
        <td>Дата</td>
        <td>Сумма баллов</td>
        <td>Средняя сумма баллов</td></tr>';

            while ($row = mysqli_fetch_assoc($query)){
                echo'
                <tr><td>'.$row['id'].'</td>
                <td>'.$row['name_opros'].'</td>
                <td>'.$row['user_name'].'</td>
                <td>'.$row['question1'].'</td>
                <td>'.$row['question2'].'</td>
                <td>'.$row['question3'].'</td>
                <td>'.$row['question4'].'</td>
                <td>'.$row['question5'].'</td>
                <td>'.$row['question5_1'].'</td>
                <td>'.$row['question5_2'].'</td>
                <td>'.$row['question6'].'</td>
                <td>Дата</td>
                <td>Сумма</td>
                <td>Ср.сумма</td></tr>
                <tr><td>Ответы</td>
                <td></td>
                <td>'.$row['user_name'].'</td>
                <td>'.$row['answer1'].'</td>
                <td>'.$row['answer2'].'</td>
                <td>'.$row['answer3'].'</td>
                <td>'.$row['answer4'].'</td>
                <td>'.$row['answer5'].'</td>
                <td>'.$row['answer5_1'].'</td>
                <td>'.$row['answer5_2'].'</td>
                <td>'.$row['answer6'].'</td>
                <td>'.$row['date'].'</td>
                <td>'.$row['sum'].'</td>
                <td>'.$row['sr_sum'].'</td></tr>';
            }
            echo'</table>';
        }
    ?>
    </main>
</body>
</html>
