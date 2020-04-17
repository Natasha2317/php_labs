<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Павлова Наталья Витальевна, 191-321.Простейшая программа на PHP. 
            Конвертация статического контента в динамический. Лабораторная работа № А-1.</title>
    <link rel="stylesheet" href="dinamic2.css">
  	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <style>
        .product-item {
            height: 900px;
        }
    </style>
    <header>
        <div class="nav-menu">
        <a href="<?php 
            $name='Главная'; // переменная с текстом ссылки
            $link='dinamic.php'; // переменная с адресом ссылки
            $current_page=FALSE; // переменная, определяющая активность пункта меню
            echo $link; // выводим адрес ссылки
            ?>"class="selected_menu <?php // начинаем второй PHP скрипт
            if( $current_page ) 
                echo' active'; ?>"><?php
                echo $name; ?></a>

        <a href="<?php
            $name='Гитары';
            $link='dinamic1.php';
            $current_page=FALSE;
            echo $link; ?>"class="selected_menu <?php
            if ($current_page)
                echo' active';?>"><?php
                    echo $name; ?></a>

        <a href="<?php
            $name='Укулеле';
            $link='dinamic2.php';
            $current_page=TRUE;
            echo $link; ?>"class="selected_menu <?php
            if ($current_page)
                echo' active';?>"><?php
                    echo $name; ?></a>
        </div>
    </header>
    <h1>Интернет-магазин гитар и укулеле</h1>
    <div class="fotos">
        <img src="foto2.jpg" class="main">
    </div>
    <h2>Укулеле</h2>
    <div class="box">
        <div class="product-item">
          <img src="ukulele1.jpg" class="ukulele1">
            <div class="product-list">
                <h3>FLIGHT NUS 310</h3>
                <span class="price">3 790р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
        <div class="product-item">
          <img src="ukulele2.jpg" class="ukulele2">
            <div class="product-list">
                <h3>KALA LEARN TO PLAY COLOR CHORD</h3>
                <span class="price">3 600р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
        <div class="product-item">
          <img src="ukulele3.jpg" class="ukulele3">
            <div class="product-list">
                <h3>VESTON KUS 25 BUNNY</h3>
                <span class="price">2 300р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<br>
<br>
<footer>
    <p>Интернет-магазин гитар и укулеле</p>
	<p>Copyright © 2020 All Rights Reserved.</p>
    <?php
        echo 'Сформировано  '.(date("d.m.Y")).' в '.(date("H-i:s"));
    ?>
</footer>
</body>
</html>