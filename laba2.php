<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевн, 191-321. Вариант №10</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <img src="logo.png">
        <h1>Лабораторная работа №2</h1>
        <h2>Циклические алгоритмы. Условия в алгоритмах. Табулирование функции</h2>
    </header>
    <main>
        <?php
              $x = 2;
              $encounting = 35;
              $step = 2;
              $type = 'A';
              $k = 0;
              $min_value = 1;	//мин знач при котором алгоритм завершает работу
              $max_value = 1000;		//макс знач при котором алг завершает работу
              $min_f= '1000';
              $max_f= '-100';
              $sum = 0;
              $mid_f=0;

              switch ($type) {
                    case 'B':
                        echo '<ul>';
                    break;

                    case 'C':
                        echo '<ol>';
                    break;

                    case 'D':
                        echo '<table class="t">
                                <tr>
                                    <td>№</td>
                                    <td>x</td>
                                    <td>f(x)</td>
                                </tr>';
                    break;
              }

              for($i = 1; $i < ($encounting+1) && $x<=$max_value && $x>=$min_value; $i++, $x+=$step){
                if ($x <= 10) {
                    if ($x == 0) {
                        $f = 'Error';
                        $k = $k -1;
                    }
                    else
                        $f = 3/$x + $x/3 - 5;
                }
                else{
                    if ($x < 20)
                        $f = ($x - 7)*($x/8);
                    else
                        $f = 3* $x + 2;
                }
                $k++;

                if ($f!=='error')
                    $sum = $sum + $f;

                $mid_f=$sum/$k;


                if ($f>=$max_f)
                    $max_f=$f;
                if ($f<=$min_f)
                    $min_f=$f;


            switch ($type){
                case 'A':
                    echo 'f('.$x.')= ';
                    echo round($f,3);
                    echo '<br>';
                break;

                case 'B':
                    echo '<li>f('.$x.')='.$f.'</li>';
                break;

                case 'C':
                    echo '<li>f('.$x.')='.$f.'</li>';
                break;

                case 'D':
                    echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$x.'</td>
                            <td>'.$f.'</tr>';
                    echo '<br>';
                    break;

                case 'E':
                    echo '<div>f('.$x.')= ';
                    echo $f;
                    echo '</div>';
            }
            }


		switch ($type){
			case 'B':
				echo '</ul>';
				break;
			case 'C':
				echo '</ol>';
				break;
			case 'D':
				echo '</table><br>';
				break;

			default:
				break;
        }
        echo '<br>';
        echo '<br>Максимальное значение = '.round($max_f,3);
        echo '<br>Минимальное значение = '.round($min_f,3);
        echo '<br>Сумма = '.round($sum,3);
        echo '<br>Среднее значение = '.round($mid_f,3);
        ?>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <?php
            echo '<p>Тип верстки '.$type.'</p>';
        ?>
    </footer>
</body>
</html>