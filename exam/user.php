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
    <h3>Эксперт</h3>
    <h4>Форма</h4>
        <?php
            $mysqli = new mysqli('std-mysql', 'std_946', 'cisco12345', 'std_946');

            if (mysqli_connect_error()){
                prinf("Соединение не установлено", mysqli_connect_error());
                exit();
            }
            $query = $mysqli->query('SELECT * FROM my_opros1');

            $row = mysqli_fetch_assoc($query);
            echo'<form action="" method="post">
            <div class="form__name">
                <label for="name">Опрос</label>
                <h4>'.$row['name_opros'].'</h4><br>
            </div>
            <div class="form__name">
            <span>Ваше имя</span>
                <input type="text" name="user_name" id="user_name" placeholder="Введите ваше имя" required autofocus><br>
            </div>
            <div class="form__name">
                <span>'.$row['question1'].'</span>
                <input type="number" name="answer1" id="answer1" placeholder="Введите ответ" required><br>
            </div>
            <div class="form__name">
            <span>'.$row['question2'].'</span>
                <input type="number" min="0" name="answer2" id="answer2" placeholder="Введите ответ" required><br>
            </div>
            <div class="form__name">
            <span>'.$row['question3'].'</span>
                <input type="text" name="answer3" id="answer3" placeholder="Введите ответ" required><br>
            </div>
            <div class="form__name">
            <span>'.$row['question4'].'</span>
                <input type="text" name="answer4" id="answer4" placeholder="Введите ответ" required><br>
            </div>
            <div class="form__name">
            <span>Ваш пол</span>
                <select name="answer5" id="status">
                    <option value="м" name="answer5">м</option>
                    <option value="ж" name="answer5">ж</option>
                </select>
            </div>
            <div class="form__name">
            <span>'.$row['question6'].'</span>
                <p>Разводить кактусы<input type="checkbox" name="answer6[0]" value="Разводить кактусы"></p>
                <p>Спорт<input type="checkbox" name="answer6[1]" value="Спорт"></p>
                <p>Танцы<input type="checkbox" name="answer6[2]" value="Танцы"></p>
            </div>
            <div class="form__name_button">
                <button type="submit" name="answer_user" value="Ответить" class="form__button">Ответить</button>
            </div>';


        if (isset($_POST['answer_user']) &&( $_POST['answer_user'] == 'Ответить')){
        $user_name = htmlspecialchars($_POST['user_name']);
        $answer1 = htmlspecialchars($_POST['answer1']);
        $answer2 = htmlspecialchars($_POST['answer2']);
        $answer3 = htmlspecialchars($_POST['answer3']);
        $answer4 = htmlspecialchars($_POST['answer4']);
        $answer5 = htmlspecialchars($_POST['answer5']);
        $date = date("Y-m-d H:i:s");

        if (isset($_POST['answer5']) &&( $_POST['answer5'] == 'м')){
            $answer5_1 = $_POST['answer5'];
            $sum = $answer5_1;
        }
        else{
            $answer5_2 = $_POST['answer5'];
            $sum = $answer5_2;
        };
        $sr_sum = $sum/5;

        $query = "INSERT INTO my_opros1(answer1, answer2, answer3, answer4, answer5, answer6, user_name, date, sum, sr_sum, answer5_1, answer5_2) VALUES ('$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$answer6', '$user_name', '$date', '$sum', '$sr_sum', $answer5_1, $answer5_2)";
        $mysqli->query($query);
        $mysqli->close();
        $url = 'http://localhost/exam/thanks.php';

        header("Location: $url");
    }
        ?>
    </main>
</body>
</html>
