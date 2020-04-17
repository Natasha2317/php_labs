<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Павлова Наталья Витальевна, 191-321.Простейшая программа на PHP. 
            Конвертация статического контента в динамический. Лабораторная работа № А-1.</title>
    <link rel="stylesheet" href="dinamic1.css">
  	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <style>
        footer{
            position: fixed;
            bottom: 0px;
            width: 100%;
            border-top: 1px solid rgb(73, 73, 73);;
            padding: 20px 0 10px;
            background-color: #4d4d4d; 
            color: rgb(197, 196, 196);
            font-family: 'Playfair Display SC', serif;
        }
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
            $current_page=TRUE;
            echo $link; ?>"class="selected_menu <?php
            if ($current_page)
                echo' active';?>"><?php
                    echo $name; ?></a>

        <a href="<?php
            $name='Укулеле';
            $link='dinamic2.php';
            $current_page=FALSE;
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
    <h2>Гитары</h2>
    <div class="box">
        <div class="product-item">
          <img src="guitar1.jpg" class="guitar">
            <div class="product-list">
                <h3>YAMAHA F310</h3>
                <span class="price">9 990р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
        <div class="product-item">
          <img src="guitar2.jpg" class="guitar">
            <div class="product-list">
                <h3>FENDER SQUIER SA-150 DREADNOUGHT, NAT</h3>
                <span class="price">6 700р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
        <div class="product-item">
          <img src="guitar3.jpg" class="guitar">
            <div class="product-list">
                <h3>FLIGHT F-230C NA</h3>
                <span class="price">7 200р</span>
                <a href="" class="button">В корзину</a>
            </div>
        </div>
    </div>
<footer>
    <p>Интернет-магазин гитар и укулеле</p>
	<p>Copyright © 2020 All Rights Reserved.</p>
    <?php
        echo 'Сформировано  '.(date("d.m.Y")).' в '.(date("H-i:s"));
    ?>
</footer>
</body>
</html>