
<?php
if (isset($_POST['A'])) // если из формы были переданы данные
  {
    $result = $_POST['RESULT'];
          $a = $_POST['A'];
          $b = $_POST['B'];
          $c = $_POST['C'];
      switch ($_POST['choose']) {
          case '1':
            $p = ($a + $b + $c) / 2;
            $true_result = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
            $result = round($result, 2);
            $true_result = round($true_result, 2);
          break;
          case '2':
            $true_result = $a + $b + $c;
            $result = round($result, 2);
            $true_result = round($true_result, 2);
          break;
          case '3':
            $true_result = ($a + $b) / 2 * $c;
            $result = round($result, 2);
            $true_result = round($true_result, 2);
          break;
          case '4':
            $true_result = $a * $b * $c;
            $result = round($result, 2);
            $true_result = round($true_result, 2);
          break;
          case '5':
            $true_result = ($a + $b + $c) / 3;
            $result = round($result, 2);
          break;
          case '6':
            $true_result = max($a, $b, $c);
            $result = round($result, 2);
          break;
      }
  }
        ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевн, 191-321.</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <img src="logo.png">
        <h1>Лабораторная работа №6</h1>
    </header>
    <main>
    <?php
      if (isset($true_result)){
        $out_text='ФИО: '.$_POST['fio'].'<br>'; // подготавливаем содержимое отчета
        $out_text.='Группа: '.$_POST['group'].'';
        if(isset($_POST['about'])) {
          $out_text.='<br>Обо мне: '.$_POST['about'].'<br>';
        }
        $out_text.='Задача: ';
        if( $_POST['choose'] == '1' ) $out_text.='ПЛОЩАДЬ ТРЕУГОЛЬНИКА'; else
        if( $_POST['choose'] == '2' ) $out_text.='ПЕРИМЕТР ТРЕУГОЛЬНИКА'; else
        if( $_POST['choose'] == '3' ) $out_text.='ПЛОЩАДь ТРАПЕЦИИ'; else
        if( $_POST['choose'] == '4' ) $out_text.='ОБЪЁМ ПАРАЛЛЕЛЕПИПЕДА'; else
        if( $_POST['choose'] == '5' ) $out_text.='СРЕДНЕЕ АРИФМЕТИЧЕСКОЕ'; else
        if( $_POST['choose'] == '6' ) $out_text.='МАКСИМАЛЬНОЕ ЧИСЛО';
        $out_text.='<br>Число А: '.$a.'<br>';
        $out_text.='Число B: '.$b.'<br>';
        $out_text.='Число C: '.$c.'<br>';
        $out_text.='Ваш ответ: '.$result.'<br>';
        $out_text.='Правильный ответ: '.$true_result.'<br>';
        if($result == $true_result)
            $out_text.='<b>ТЕСТ УСПЕШНО ПРОЙДЕН!</b><br>';
        else
            $out_text.='<b>ОШИБКА: ТЕСТ НЕ ПРОЙДЕН!</b><br>';

        if( array_key_exists('email_check', $_POST) ){
        // подготавливаем текст письма, заменяя или удаляя теги
        $mail_text = str_replace('<br>', "\r\n", $out_text);
        $mail_text = str_replace('<b>', " ", $mail_text);
        $mail_text = str_replace('</b>', " ", $mail_text);
        $email = $_POST['email'];

        require 'class_phpmailer.php';
        require 'class_smtp.php';

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'nvpavlova23';
        $mail->Password = 'Cisco12345';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->CharSet="UTF-8";
        $mail->setFrom('nvpavlova23@mail.ru');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Результат тестирования";
        $mail->Body    = "$mail_text";
    }
    if ($_POST['variant'] == 'browser'){
     echo '<p>'.$out_text.''; // выводим отчет в браузер
     if( array_key_exists('email_check', $_POST) ) // если нужно отправить результаты
     {
       if(!$mail->send()) {
         echo '<br>Сообщение не может быть отправлено ';
         echo 'Ошибка: ' . $mail->ErrorInfo;
        }
      else echo '<br>Результаты теста были отправлены'.$_POST['email'];
      }
      $fio = $_POST['fio'];
      $group = $_POST['group'];
      echo '<br><a href="?fio='.$fio.'&group='.$group.'">Повторить тест</a></p>';
    }
   else{
       echo '<p>'.$out_text.'</p>';
     }
   }
   else{
     $randomA = mt_rand(100,10000)/100;
     $randomB = mt_rand(100,10000)/100;
     $randomC = mt_rand(100,10000)/100;
     echo '
     <h1>Форма</h1>
     <form method="post" action="" autocomplete="on" name="form">
       <fieldset>
         <legend>О вас</legend>
         <label for="fio" id="fio">ФИО </label>
         <input type="text" name="fio" required style="width: 270px" autofocus ';
         if (isset($_GET['fio']))
          echo 'value="'.$_GET['fio'].'"';
          echo '><br>
         <label for="group" id="group">Группа </label>
         <input type="text" name="group" required ';if (isset($_GET['group'])) echo 'value="'.$_GET['group'].'"'; echo '><br>
         <label for="about">О себе </label>
         <textarea name="about"></textarea><br>
       </fieldset><br>
       <fieldset>
         <legend>Задача</legend>
         <span>Тип задачи:</span><br>
         <select name="choose">
           <option value="1" name="choose">Площадь треугольника</option>
           <option value="2" name="choose">Периметр треугольника</option>
           <option value="3" name="choose">Площадь трапеции</option>
           <option value="4" name="choose">Объем параллелепипеда</option>
           <option value="5" name="choose">Среднее арифметическое</option>
           <option value="6" name="choose">Максимальное число</option>
         </select>
           <br>
         <span>Входные данные:</span><br>
           <label class="number" for="A">Число A </label>
           <input type="number" name="A" required step="any" value="'.$randomA.'"><br>
           <label class="number" for="B">Число B </label>
           <input type="number" name="B" required step="any" value="'.$randomB.'"><br>
           <label class="number" for="C">Число C </label>
           <input type="number" name="C" required step="any" value="'.$randomC.'"><br>

         <span>Ваш ответ:</span><br>
           <input type="number" name="RESULT" required step="any">
       </fieldset>
         <br>
         <select name="variant">
           <option value="browser">
           Версия для просмотра в браузере
           </option>
           <option value="print">
           Версия для печати
           </option>
         </select>
         <br>
         <input type="checkbox" name="email_check" onClick="obj=document.getElementById(';
         echo "'hide'";
         echo ');
         if(this.checked)
            obj.style.display=';
            echo "'block'";
            echo ';
         else
            obj.style.display=';
            echo "'none'";
            echo ';">
         <label for="email_check">Отправить результат теста по e-mail</label>
         <br>
         <div  id="hide" style="display: none">
           <label for="email"> Ваш E-mail: </label>
           <input type="email" name="email" style="width: 250px">
           <br>
         </div>
         <button type="submit">Проверить</button>
         <br><br>
     </form> ';
    }
    ?>
  </main>
<foo
</body>
</html>