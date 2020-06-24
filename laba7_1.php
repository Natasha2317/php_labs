<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевна, 191-321</title>
    <link rel="stylesheet" href="style7.css?<?php echo time();?>">>
</head>
<body>
    <header>
        <img src="logo.png">
        <h1>Лабораторная работа №7</h1>
    </header>
    <div class="container">
				<div class="row">
					<div class="col-sm 12 col-md-12 col-lg-6 col-xl-6">
                        <h2 class="mt-3 mb-4">Сортировка массива</h2>
                        <?php
                            if (!isset($_POST['element0'])) //Если массив не задан
                            {
                                echo <<<HERE
                                <div class="alert alert-danger mt-3 mb-4" role="alert">
                                    Массив не был задан
                                </div>
                                HERE;
                                exit(); //Завершаем программу
                            }

                            for ($i = 0; $i < $_POST['arrLength']; $i++) //В зависимости от размера массива, начинаем цикл
                            {
                                if (arg_is_not_Num($_POST['element' . $i])) //Если елемент не число
                                {
                                    echo '<h1>Элемент массива "' . $_POST['element' . $i] . '" - не число</h1>';
                                    exit();
                                }
                            }

                            //В зависимости от выбранного алгоритма выводим его название
                            switch ($_POST['algoritm']) {
                                case '1':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Сортировка выбором</small></h4>';
                                    break;

                                case '2':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Пузырьковый алгоритм</small></h4>';
                                    break;

                                case '3':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Алгоритм Шелла</small></h4>';
                                    break;

                                case '4':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Алгоритм садового гнома</small></h4>';
                                    break;

                                case '5':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Быстрая сортировка</small></h4>';
                                    break;

                                case '6':
                                    echo '<h4>Алгоритм сортировки: <small class="text-muted">Встроенная функция PHP для сортировки по значению</small></h4>';
                                    break;
                            }

                            $arr = array(); //Создаём пустой массив для сортировки
                            echo '<h4 class="mt-4 mb-1">Исходный массив</h4>'; //Отмечаем начало исходного массива

                            //Начинаем цикл для каждого элемента массива
                            for ($i = 0; $i < $_POST['arrLength']; $i++) {
                                // Выводим элемент массива и его номер
                                echo '<div class="arr_element">' . $i . ': ' . $_POST['element' . $i] . '</div>';
                                $arr[] = $_POST['element' . $i]; //Добавляем элемент в массив для сортировки
                            }

                            //Выводим сообщение о возможности сортировки массива
                            echo <<<HERE
                                <div class="alert alert-dark mt-3 mb-4" role="alert">
                                    Массив проверен, сортировка возможна
                                </div>
HERE;

                            $time = microtime(true); //Засекаем время
                            //В зависимости от выбранного алгоритма начинаем сортировку
                            switch ($_POST['algoritm']) {
                                case '1':
                                    $n = sort_1($arr);
                                    break;

                                case '2':
                                    $n = sort_2($arr);
                                    break;

                                case '3':
                                    $n = sort_3($arr);
                                    break;

                                case '4':
                                    $n = sort_4($arr);
                                    break;

                                case '5':
                                    echo '<h4 class="mt-4 mb-3">Состояние массива до сортировки</h4>';
                                    for ($m = 0; $m < count($arr); $m++) //Выводим неотсортированный массив
                                    {
                                        echo '<span>' . $arr[$m] . '</span>';
                                    }

                                    echo '<br><br>';
                                    $iterator = 0;
                                    $n = sort_5($arr, 0, (count($arr) - 1) , $iterator);
                                    break;

                                case '6':
                                    echo '<h4 class="mt-4 mb-3">Состояние массива до сортировки</h4>';
                                    for ($m = 0; $m < count($arr); $m++) //Выводим неотсортированный массив
                                    {
                                        echo '<span>' . $arr[$m] . '</span>';
                                    }

                                    echo '<br><br>';
                                    $n = sort($arr);
                                    echo '<h4 class="mt-2">Состояние массива после сортировки</h4>';
                                    for ($m = 0; $m < count($arr); $m++) //Выводим отсортированный массив
                                    {
                                        echo '<span>' . $arr[$m] . '</span>';
                                    }

                                    echo '<br><br>';
                                    break;
                            }

                            // Выводим сообщение о завершении сортировки и число итераций
                            // Считаем затраченое время
                            $duration = microtime(true) - $time;
                            echo <<<HERE
                                <div class="alert alert-success mt-4" role="alert">
                                  <h4 class="alert-heading">Сортировка завершена!</h4>
                                  <p>Проведено $n итераций </p>
                                  <hr>
                                  <p class="mb-0">Затрачено $duration микросекунд.</p>
                                </div>
HERE;


                            //Функция сортировки выбором
                            function sort_1($ar) {
                                $iterator = 0; //Задаём счетчик операций
                                echo '<h6 class="mt-4 mb-3">Состояние массива до сортировки</h6>';
                                for ($i = 0; $i < count($ar); $i++) //Выводим неотсортированный массив
                                    echo "<span>$ar[$i]</span>";
                                echo '<br>';
                                echo '<br>';

                                for ($i = 0; $i < count($ar) - 1; $i++) //Цикл для всех элементов массива
                                {
                                    $min = $i; //За минимальное значение принимаем текущее i
                                    for ($j = $i + 1; $j < count($ar); $j++) //Ищем минимальный элемент массива
                                    {
                                        if ($ar[$j] < $ar[$min])
                                            $min = $j; //При нахождении такого элемента, назначем его за минимальный
                                    }

                                    if ($min > $i) //Если минимальный элемент находится правее элемента i
                                    {
                                        $element = $ar[$i];
                                        $ar[$i] = $ar[$min]; //Меняем элементы местами
                                        $ar[$min] = $element;
                                    }

                                    $iterator++; //Повышаем счетчик итераций
                                    echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                    for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                        echo "<span>$ar[$m]</span>";
                                    echo '<br>';
                                    echo '<br>';
                                }

                                return $iterator;
                            }

                            //Функция сортировки пузырьком
                            function sort_2($ar) {
                                $iterator = 0; //Задаём счетчик операций
                                echo '<h6 class="mt-4 mb-3">Состояние массива до сортировки</h6>';
                                for ($i = 0; $i < count($ar); $i++) //Выводим неотсортированный массив
                                    echo '<span>' . $ar[$i] . '</span>';
                                echo '<br>';
                                echo '<br>';

                                for ($j = 0; $j < count($ar) - 1; $j++) //Выполняем алгоритм (длина массива - 1) раз
                                {
                                    for ($i = 0; $i < count($ar) - 1 - $j; $i++) {
                                        if ($ar[$i] < $ar[$i + 1]) //Если элемент меньше последующего,меняем их местами
                                        {
                                            $temp = $ar[$i];
                                            $ar[$i] = $ar[$i + 1];
                                            $ar[$i + 1] = $temp;
                                        }

                                        $iterator++; //Повышаем счетчик итераций
                                        echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                        for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                            echo "<span>$ar[$m]</span>";
                                        echo '<br>';
                                        echo '<br>';
                                    }
                                }

                                return $iterator;
                            }

                            //Алгоритм сортировки Шелла
                            function sort_3($ar) {
                                $iterator = 0; //Задаём счетчик операций
                                echo '<h6 class="mt-4 mb-3">Состояние массива до сортировки</h6>';
                                for ($i = 0; $i < count($ar); $i++) //Выводим неотсортированный массив
                                    echo '<span>' . $ar[$i] . '</span>';
                                echo '<br><br>';
                                for ($k = ceil(count($ar) / 2); $k >= 1; $k = ceil($k / 2)) //Начинаем цикл
                                {
                                    for ($i = $k; $i < count($ar); $i++) //Для всех элементов начиная с i
                                    {
                                        $val = $ar[$i]; //Сохраняем текущий элемент массива
                                        $j = $i - $k; //Назначем индекс сравниваемый элемент
                                        while ($j >= 0 && $ar[$j] > $val) //Пока j>=0 и назначенный элемент болше сравниваемого
                                        {
                                            $ar[$j + $k] = $ar[$j]; //Приравниваем элементы
                                            $j-= $k; //Сдвигаем азначенный элемент на k влево
                                            $iterator++; //Повышаем счетчик итераций
                                            echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                            for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                                echo "<span>$ar[$m]</span>";

                                            echo '<br><br>';
                                        }

                                        $ar[$j + $k] = $val; //Возращаем сохраненный элемент массива
                                        $iterator++; //Повышаем счетчик итераций
                                        echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                        for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                            echo "<span>$ar[$m]</span>";

                                        echo '<br><br>';
                                    }

                                    if ($k == 1) //Когда к достигает значение единицы
                                        $k = 0; //Приравниваем к 0, чтобы избежать бесконечного цикла for
                                }

                                return $iterator;
                            }

                            //Функция сортировки садового гнома
                            function sort_4($ar) {
                                $i = 1; //Начинаем со второго элемента массива
                                $j = 2;
                                $iterator = 0; //Задаём счетчик операций
                                echo '<h6 class="mt-4 mb-3">Состояние массива до сортировки</h6>';
                                for ($m = 0; $m < count($ar); $m++) //Выводим неотсортированный массив
                                    echo "<span>$ar[$m]</span>";
                                    echo '<br><br>';
                                while ($i < count($ar)) //Пока не достигнут последний элемент массива
                                {
                                    if (!$i || $ar[$i - 1] <= $ar[$i]) //Если предыдущего элемента нет или предыдущий элемент меньше следующего
                                    {
                                        $i = $j; //Возращаемся на место, до которого доходили
                                        $j++;
                                        $iterator++; //Повышаем счетчик итераций
                                        echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                        for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                            echo "<span>$ar[$m]</span>";

                                        echo '<br><br>';
                                    }
                                    else {
                                        $temp = $ar[$i];
                                        $ar[$i] = $ar[$i - 1]; //Меняем элементы местами
                                        $ar[$i - 1] = $temp;
                                        $i--; //Шагаем назад
                                        $iterator++; //Повышаем счетчик итераций
                                        echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                        for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                            echo "<span>$ar[$m]</span>";

                                        echo '<br><br>';
                                    }
                                }

                                return $iterator;
                            }

                            //Функция быстрой сортировки
                            function sort_5(&$ar, $left, $right, &$iterator) {
                                $l = $left; //Копируем переменные
                                $r = $right;
                                $point = $ar[floor(($left + $right) / 2) ]; //Ищем опорную точку
                                do {
                                    while ($ar[$l] < $point) //Сдвигаем левую границу до тех пор пока она не окажется больше или равна опорной точке
                                        $l++;

                                    while ($ar[$r] > $point) //Сдвигаем правую грааницу до тех пор пока она не окажется меньше или равна опорной точке
                                        $r--;

                                    if ($l <= $r) //Если правая и левая границы не пересекаются
                                    {
                                        // Меняем элементы местами
                                        $temp = $ar[$l];
                                        $ar[$l] = $ar[$r];
                                        $ar[$r] = $temp;

                                        // Сдвигаем границы дальше
                                        $r--;
                                        $l++;
                                        $iterator++; //Повышаем счетчик итераций
                                        echo '<h6 class="mb-3">Итерация ' . $iterator . '</h6>';
                                        for ($m = 0; $m < count($ar); $m++) //Выводим текущее состояние массива
                                            echo "<span>$ar[$m]</span>";

                                        echo '<br><br>';
                                    }
                                }

                                while ($r >= $l); //Выполняем цикл пока границы не пересекутся
                                if ($r > $left) //Если есть левая часть массива
                                    sort_5($ar, $left, $r, $iterator); //Сортируем её

                                if ($l < $right) //Если есть правая часть массива
                                    sort_5($ar, $l, $right, $iterator); //Сортируем её

                                return $iterator;
                            }

                            //Функция проверки на значение переменной
                            function arg_is_not_Num($arg) {
                                if ($arg == '') //Если элемент не задан
                                    return true;

                                for ($i = 0; $i < strlen($arg); $i++) {
                                    if ($arg[$i] !== '0' && $arg[$i] !== '1' && $arg[$i] !== '2' && $arg[$i] !== '3' && $arg[$i] !== '4' && $arg[$i] !== '5' && $arg[$i] !== '6' && $arg[$i] !== '7' && $arg[$i] !== '8' && $arg[$i] !== '9')
                                        return true;
                                }

                                return false;
                            }
                        ?>
					</div>
				</div>
			</div>
		</main>
		<footer>
				<div class="row">
			</div>
		</footer>
        <script>
            function setHTML(element, txt) {
                if (element.innerHTML) {
                    element.innerHTML = txt;
                } else //Если функции innerHTML не существует, делаем всё вручную
                {
                    var range = document.createRange();
                    range.selectNodeContents(element);
                    range.deleteContents();
                    var fragment = range.createContextualFragment(txt);
                    element.appendChild(fragment);
                }
            }

            function addElement(table_name) {
                var t = document.getElementById(table_name);
                var index = t.rows.length; //индекс строки
                var row = t.insertRow(index); //Добавляем строку
                var cel = row.insertCell(0); //Добавляем ячейку
                cel.className = 'element_row'; //Задаём класс
                var celcontent = '<div class="form-group"><label for="element1">' + index + '-й элемент</label><input type="text" class="form-control" id="element' + index + '"></div>'; //Контент ячейки
                setHTML(cel, celcontent); //Заполняем ячейку контентом
                //Заполняем данными скрытый элемент
                document.getElementById('arrLength').value = t.rows.length;
            }
        </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="/term2/php/templates/js/scrollyeah.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>
	</body>
</html>