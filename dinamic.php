<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <?php 
    $title='Павлова Наталья Витальевна, 191-321.Простейшая программа на PHP. 
            Конвертация статического контента в динамический. Лабораторная работа № А-1.';
    echo '<title>'.$title.'</title>'
    ?>
    <link rel="stylesheet" href="dinamic.css">
  	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<body>
    <header>
        <div class="nav-menu">
        <a href="<?php 
            $name='Главная'; // переменная с текстом ссылки
            $link='dinamic.php'; // переменная с адресом ссылки
            $current_page=TRUE; // переменная, определяющая активность пункта меню
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
            $current_page=FALSE;
            echo $link; ?>"class="selected_menu <?php
            if ($current_page)
                echo' active';?>"><?php
                    echo $name; ?></a>
        </div>
    </header>
    <h1>Интернет-магазин гитар и укулеле</h1>
    <div class="fotos">
    <?php 
        echo'<img src="foto'.(date('s') % 2 + 1).'.jpg" alt="Меняющаяся фотография">'
    ?>
    </div>
    <div>
        <h2>Наши преимущества</h2>
        <table>
        <?php
           echo'<tr>
                <th>Качество</th>
                <th>Сервис</th>
                <th>Удобство оплаты</th>
            </tr>';
        ?>
            <tr>
                <td><?php echo'Прямые поставки от производителя с полным контролем качества на всех этапах производства.' ?></td>
                <td><?php echo'Консультации квалифицированных менеджеров, доставка в удобное для вас время.' ?></td>
                <td><?php echo'Вы можете выбрать подходящую вам схему оплаты (наличный, безналичный расчет, банковской карточкой).' ?></td>
            </tr>
            <tr>
                <td>Uарантийное обслуживание после покупки.</td>
                <td>Сервис-центры по всей России и возможность возврата товара, если он вас не устроил.</td>
                <td>Вы можете выбрать покупку в рассрочку или кредит с выбором срока, процентной ставки и размера первого взноса.</td>
            </tr>
        </table>
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
<footer>
    <p>Интернет-магазин гитар и укулеле</p>
	<p>Copyright © 2020 All Rights Reserved.</p>
    <?php
        echo 'Сформировано  '.(date("d.m.Y")).' в '.(date("H-i:s"));
    ?>
</footer>
</body>
</html>