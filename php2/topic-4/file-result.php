<?php
// Установим константу для хранения имени файла
define('filename', 'users.txt');

// Проверим, были ли корректно отправлены данные из формы
if(
	isset($_POST['fname']) && !empty($_POST['fname']) &&
	isset($_POST['lname']) && !empty($_POST['lname'])
){
	// Отфильтруем полученные данные
	$fname = stripslashes(trim(htmlspecialchars($_POST['fname'],ENT_QUOTES)));
	$lname = stripslashes(trim(htmlspecialchars($_POST['lname'],ENT_QUOTES)));
	
	// Сформируем строку для записи в файл
	$str = $fname . ' ' . $lname . "\r\n";
	// Откроем соединение с файлом
	$f = fopen(filename, 'a');
	if(is_resource($f)){
		// Запишем строку в файл и закроем соединение
		fputs($f, $str);
		fclose($f);
	}
	
	// Перезапрос страницы
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

Имя: <input type="text" name="fname" /><br />
Фамилия: <input type="text" name="lname" /><br />

<br />

<input type="submit" value="Отправить!" />

</form>

<?php
// Проверим, существует ли файл
if(file_exists(filename)){
	// Получим все содержимое файла в виде массива
	$lines = file(filename);
	
	if(is_array($lines)){
		echo '<hr /><pre>';
		
		// В цикле выведем все строки файла
		$i = 1;
		foreach($lines as $line){
			echo $i, ' ', $line, '<br />';
			$i++;
		}
		
		echo '</pre>';
	}
	
	// Выведем размер файла
	echo '<p>Размер файла: ', filesize(filename), ' байт</p>';
}
?>

</body>
</html>