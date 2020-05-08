<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевн, 191-321.</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
    <header>
        <img src="logo.png">
        <div id="main_menu"><?php
            	echo '<a href="?html_type=TABLE';
            	if (isset($_GET['content']))
             		echo '&content='.$_GET['content'];
            	echo '"';
            	if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'TABLE')
              		echo ' class="selected"';
            	echo '>Табличная форма вёрстки</a>';
            	echo '<a href="?html_type=DIV';
            	if (isset($_GET['content']))
              		echo '&content='.$_GET['content'];
            	echo '"';
            	if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV')
              		echo ' class="selected"';
            	echo '>Блочная форма вёрстки</a>';
        ?></div>
    </header>
    <main>
        <div class="main_container">
            <div class="main_container__column">
                <div class="main_container__column__column1">
                    <div id="product_menu"><?php
                        echo '<a href="';
                        if (isset($_GET['html_type']))
                            echo '?html_type='.$_GET['html_type'];
                        else echo '?html_type=TABLE';
                        echo '"';
                        if (!isset($_GET['content']))
                            echo 'class="selected"';
                        echo '>Вся таблица умножения</a><br>';

                        for ($i = 2; $i < 10; $i++){
                            echo '<a href="?';
                            if (isset($_GET['html_type']))
                                echo 'html_type='.$_GET['html_type'].'&';
                            else
                            echo 'html_type=TABLE&';
                            echo 'content='.$i.'"';
                            if (isset($_GET['content']) && $_GET['content'] == $i)
                                echo ' class="selected"';
                            echo '>Таблица умножения на '.$i.'</a><br>';
                        }
                    ?>
                    </div>
                </div>
                <div>
                    <?php
                        function outNumbers($k) {				//ввывод числа
                            if ($k < 10)
                              if (array_key_exists('html_type', $_GET))
                                return '<a href="?html_type='.$_GET['html_type'].'&content='.$k.'">'.$k.'</a>';
                              else
                                return '<a href="?html_type=TABLE&content='.$k.'">'.$k.'</a>';
                            else return $k;
                          }
                        function outRow($n){
                            if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV')
                                for($i = 2; $i < 10; $i++)
                                    echo outNumbers($n).'x'.outNumbers($i).'='.outNumbers($n*$i).'<br>';
                            else
                                for ($i = 2; $i < 9; $i++)
                                    echo outNumbers($n).'x'.outNumbers($i).'='.outNumbers($n*$i).'<br>';
                        }
                        function outTableForm(){
                            echo '<table>';
                            if (!isset($_GET['content']))
                                for ($i = 2; $i < 10; $i++) {
                                    if (($i == 2) || ($i == 6))
                                        echo '<tr>';
                                        echo '<td>';
                                        outRow($i);
                                        echo '</td>';
                                    if (($i == 5) || ($i == 9)) echo '</tr>';
                                }
                                    else {
                                        echo '<tr class="first_row_table"><td>';
                                        outRow($_GET['content']);
                                        echo '</td></tr>';
                                    }
                                echo '</table>';
                          }

                        function outDivForm() {
                            if (!isset($_GET['content']))
                                for ($i = 2; $i < 10; $i++) {
                                    echo '<div class="row_div">';
                                    outRow($i);
                                    echo '</div>';
                                }
                            else {
                                echo '<div class="first_row_div">';
                                outRow($_GET['content']);
                                echo '</div>';
                            }
                        }

                          if (!array_key_exists('html_type', $_GET))
                              outTableForm();
                          if (isset($_GET['html_type']) && $_GET['html_type'] == 'TABLE')
                              outTableForm();
                          if (isset($_GET['html_type']) && $_GET['html_type'] == 'DIV')
                              outDivForm();
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
    <div class="footer">
        <?php
            if (!isset($_GET['html_type']) || $_GET['html_type'] == 'TABLE')
                echo 'Табличная форма вёрстки';
            else
                echo 'Блочная форма вёрстки';
          ?>
          <p>Таблица умножения <?php
            if (!isset($_GET['content']))
                echo '(полная)';
            else
                echo 'на '.$_GET['content'];
          ?></p>
        <?php echo date('d M Y h:i:s'); ?>
       </div>
    </footer>
</body>
</html>