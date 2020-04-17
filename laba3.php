<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевн, 191-321</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
        <img src="logo.png">
        <h1>Лабораторная работа №3</h1>
        <h2>Использование GET-параметров в ссылках.Виртуальная клавиатура.</h2>
    </header>
    <main>
        <?php
            if ( !isset($_GET['store']) ){
                $_GET['store'] = '';
            }
            else
            if ( isset ($_GET['key']) ){
                $_GET['store'].=$_GET['key'];
            }

            if ( !isset($_GET['num']) ){
                $_GET['num'] = 0;
            }
            else
            if (isset($_GET['num'])){
                $_GET['num']++;
            }

            echo '<div class="result">'.$_GET['store'].'</div>';

        ?>
        <div class="link">
            <a class="number" href="?key=1&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">1</a>
            <a class="number" href="?key=2&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">2</a>
            <a class="number" href="?key=3&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">3</a>
            <a class="number" href="?key=4&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">4</a>
            <a class="number" href="?key=5&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">5</a>
            <a class="number" href="?key=6&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">6</a>
            <a class="number" href="?key=7&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">7</a>
            <a class="number" href="?key=8&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">8</a>
            <a class="number" href="?key=9&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">9</a>
            <a class="number" href="?key=0&num=<?php echo $_GET['num']; ?>&store=<?php echo $_GET['store']; ?>">0</a>
        </div>
        <div class="reset">
            <a class="res" href="index.php?num=<?php echo $_GET['num']; ?>">СБРОС</a>
        </div>
    </main>
    <footer>
            <?php
                echo $_GET['num']++;
            ?>
    </footer>
</body>
</html>