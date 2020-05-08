<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевн, 191-321.</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <header>
        <img src="logo.png">
    </header>
    <main>
        <?php
            $structure = array('яблоки*груши*сливы#27кг*10кг*13кг', 'помидоры*картофель#25кг*38кг*4кг', ' ');
            function isNullOrEmpty($str){
                return (!isset($str) || trim($str) === '');
            }

            function is_Null_Table($strings){
                for ($i = 0; $i < count($strings); $i++){                       // проверяем, что таблица существует
                    if (isset($strings[$i]) && strlen($strings[$i]) != 0){
                        return false;                                           //таблица существует
                        break;
                    }
                }
                return true;  // таблица не существует
            }
            function in_Table($str, $maxKolvoRowInString){
                $datas = explode('*', $str);
                $ret = '<tr>';

                for ($i = 0; $i < count($datas); $i++){
                    $ret .= '<td>'.$datas[$i].'</td>';
                }
                if (count(explode('*', $str)) < $maxKolvoRowInString){       //если количество ячеек в строке(колонок) меньше максимального количества ячеек в строке в таблице
                    $k = $maxKolvoRowInString - count(explode('*', $str));   //считаем количество пустых ячеек

                    for ($i = 0; $i < $k; $i++){
                        $ret .= '<td></td>';                                     // создаем пустые ячейки
                    }
                }

                $ret .= '</tr>';
                return $ret;
            }
            function outTable($str) // объявление функции
            {
                $strings = explode('#', $str); // разбиваем структуру на строки
                $maxlen = 0;

                if (is_Null_Table($strings)){
                    $ret = 'В таблице нет строк';
                }
                else{
                    if (count($strings) > 0 && !isNullOrEmpty($strings[0])){
                        $maxlen = count(explode('*', $strings[0]));
                    }
                    for ($i = 0; $i < count($strings); $i++){
                        if (!isNullOrEmpty($strings[$i]) && count(explode('*', $strings[$i])) > $maxlen){
                            $maxlen = count(explode('*', $strings[$i]));
                        }
                    }

                    if ($maxlen == 0){
                        $ret = 'В таблице нет строк с ячейками';
                    }
                    else
                        if ($strings == 0){
                            $ret = 'В таблице нет строк с ячейками';
                    }
                    else{
                        $ret = '<table>';
                        for ($i = 0; $i < count($strings); $i++){
                            //если длина строки 0 или строка пустая значит не выводим её так как как в ней нет ячеек
                            if (strlen($strings[$i]) == 0 || isNullOrEmpty($strings[$i])){
                                continue;
                            }
                            $ret .= in_Table($strings[$i], $maxlen);
                        }

                        $ret .= '</table>';
                    }
                }
                return $ret;
            }


            for ($i = 0; $i < count($structure); $i++){
                echo '<h2>На складе №'.($i + 1).'</h2>';
                echo outTable($structure[$i]).'<br>';
            }
        ?>
    </main>
    <footer>
    </footer>
</body>
</html>