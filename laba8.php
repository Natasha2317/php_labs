<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Павлова Наталья Витальевна, 191-321</title>
    <link rel="stylesheet" href="css/style8.css?<?php echo time();?>">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Playfair+Display+SC" rel="stylesheet">
</head>
<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Playfair Display SC', serif;
	}
	body{
		background-color: lightgray;
		padding: 15px !important;
	}
	header{
		position:fixed;
		top:0;
		left:0;
		width:100%;
		height: 90px;
		background-color: rgba(255, 205, 205, 0.616) !important;
		padding: 10px;
		z-index: 10;
		display: flex;
		justify-content: space-between;
		font-size: 12px;
	}
	h1{
		margin-top: 20px;
	}
	header > img{
		width: 282px;
		height: 75px;
	}
	.content {
		width: 80%;
		margin: 0 auto;
	}
	.container {
		height: 50px;
	}
	.menu {
		padding: 0 20;
		display: flex;
		justify-content: space-between;
	}
	.main__content form {
		margin-top: 5px;
		display: flex;
		flex-direction: column;
	}
	.main__content form textarea {
		resize: none;
	}
	.text_analiz {
		margin-top: 35px;
	}
	.text_analiz .text_analiz__res {
		color: purple;
		font-style: italic;
		margin-bottom: 10px;
	}
	.another_analiz {
		width: 250px;
		height: 30px;
		border-radius: 50px;
		background-color: darkgrey;
	}
	.another {
		margin: 15px 0;
		display: flex;
		justify-content: center;
	}
	.another_analiz a {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100%;
		text-decoration: none;
		color: white;
	}
	main {
		background-color: lightgrey;
		height: 800px;
		margin-top: 120px;
	}
	h2 {
		margin-top: 10px;
	}
	p{
		font-size: 18px;
		text-align: center;
	}
	table {
		margin: 0 auto;
		width: 50%;
		border: 2px solid black;
		table-layout: fixed;
		border-collapse: collapse;
		padding: 8px;
		margin-top: 10px;
	}
	td {
		text-align: center;
		border: 2px solid black;
	}
	th {
		text-align: center;
		border: 2px solid black;
	}
	textarea{
		margin-top: 100px;
	}
	footer {
		width: 100%;
		height: 45px;
		background-color: rgba(255, 205, 205, 0.616);
		color: white;
		position: fixed;
		bottom: 0;
		left: 0;
	}
</style>
<body>
    <header>
        <img src="logo.png">
        <h1>Лабораторная работа №8</h1>
    </header>
		<div class="container"></div>
		<main>
			<div class="content">
				<div class="main__content">
					<div class="text_analiz">
						<?php
							function an($msg) {
								$cifra = array('0' => true, '1' => true, '2' => true, '3' => true, '4' => true,
								'5' => true, '6' => true, '7' => true, '8' => true, '9' => true);
								$cifra_amount = 0;
								$word_amount = 0;
								$letter_amount = 0;
								$znak_amount = 0;
								$symbols_reamount = '';
								$word_list = '';
								$word = '';
								$up_l_amount = 0;
								$low_l_amount = 0;
								$words = array();
								$msg = str_replace(array("\r\n", "\r", "\n"), ' ',  strip_tags($msg));
								for ($i = 0; $i < strlen($msg); $i++) {
									if (array_key_exists($msg[$i], $cifra)) {
										$cifra_amount++;
									}
									if (($msg[$i] == ' ') || ($i == strlen($msg) - 1) || ($msg[$i] == ',') || ($msg[$i] == '.') || ($msg[$i] == '.') || ($msg[$i] == ';') || ($msg[$i] == ':') || ($msg[$i] == '?')) {
										if (($msg[$i] == ',') || ($msg[$i] == '.') || ($msg[$i] == '/') || ($msg[$i] == ';') || ($msg[$i] == ':') || ($msg[$i] == '?')) {
											$znak_amount++;
										}
									}
									else {
										$letter_amount++;
										if ($msg[$i] === strtoupper($msg[$i])) {
	   										$up_l_amount++;
										}
										else {
	   										$low_l_amount++;
										}
									}
									if (($msg[$i] == ',') || ($msg[$i] == '.') || ($msg[$i] == ';') || ($msg[$i] == ':') || ($msg[$i] == '!') || ($msg[$i] == '?') || ($msg[$i] == ' ') || ($i == strlen($msg) - 1)) {
										if (($i == strlen($msg) - 1) and ($msg[$i] != ',') and ($msg[$i] != '.') and ($msg[$i] != ';') and ($msg[$i] != ':') and ($msg[$i] != '!') and ($msg[$i] != '?') and ($msg[$i] != ' ')) {
											$word .= $msg[$i];
										}
										if ($word) {
											if (isset($words[$word])) {
												$words[$word]++;
											}
											else {
												$words[$word] = 1;
											}
										}
										$word='';
									}
									else {
										$word .= $msg[$i];
									}
								}
								$symbs = array();
								$l_text = strtolower($msg);
								for ($i = 0; $i < strlen($l_text); $i++) {
									if( isset($symbs[$l_text[$i]]) ) {
										$symbs[$l_text[$i]]++;
									}
									else {
										$symbs[$l_text[$i]] = 1;
									}
								}
								foreach ($symbs as $k => $v) {
									$symbols_reamount .= '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
								}
								ksort($words);
								foreach ($words as $key => $value) {
									$word_list .= '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
								}
								echo '<table>';
								echo '<tr><th>Количество символов</th><td>'.strlen($msg).'</td></tr>';
								echo '<tr><th>Количество букв</th><td>'.$letter_amount.'</td></tr>';
								echo '<tr><th>Количество строчных букв</th><td>'.$low_l_amount.'</td></tr>';
								echo '<tr><th>Количество заглавных букв</th><td>'.$up_l_amount.'</td></tr>';
								echo '<tr><th>Количество знаков</th><td>'.$znak_amount.'</td></tr>';
								echo '<tr><th>Количество цифр</th><td>'.$cifra_amount.'</td></tr>';
								echo '<tr><th>Количество слов</th><td>'.count($words).'</td></tr>';
								echo '</table>';
								echo '<table>';
								echo '<tr><th colspan="2">Количество вхождений каждого символа текста</th></tr>'.iconv("cp1251", "utf-8", $symbols_reamount);
								echo '<tr><th colspan="2">Список слов</th></tr>'.iconv("cp1251", "utf-8", $word_list);
								echo '</table>';
							}
							$text = iconv("cp1251", "utf-8", $_POST['text']);
							if(isset($_POST['text'])) {
								echo '<p>Текст: </p><p class="text_analiz__res">'.iconv("cp1251", "utf-8", $text).'</p>';
								an($text);
							}
							else {
								echo '<p>Нет текста для анализа.</p>';
							}
						?>
						<div class="another">
							<div class="another_analiz">
								<a href="index8.html">Другой анализ</a>
							</div>
						</div>
						<div class="container"></div>
					</div>
				</div>
			</div>
		</main>
		<footer>
			<div class="content">
				<div class="footer">
				</div>
			</div>
		</footer>
	</div>
</body>
</html>
