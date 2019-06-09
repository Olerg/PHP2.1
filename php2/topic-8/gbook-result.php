<?php
// Подключаемся к серверу БД и выбираем необходимую базу данных
define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "guest");
$link_db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_error());
/*
	mysqli_query($link_db, "SET NAMES 'utf-8'"); 	// Устаревший синтаксис для установки кодировки
	mysqli_set_charset($link_db, 'utf-8'); 			// Современный синтаксис для установки кодировки
	$charset = mysqli_character_set_name($link_db); // Получение кодировки
*/
mysqli_set_charset($link_db, 'utf-8'); 	
// Проверяем, была ли корректным образом отправлена форма
if(
	isset($_POST['name']) && !empty($_POST['name']) &&
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['msg']) && !empty($_POST['msg'])
){
	// Фильтруем полученные данные
	$name = mysqli_real_escape_string($link_db, trim(strip_tags($_POST['name'])));
	$email = mysqli_real_escape_string($link_db, trim(strip_tags($_POST['email'])));
	$msg = mysqli_real_escape_string($link_db, trim(strip_tags($_POST['msg'])));
	
	// Формируем SQL-оператор на вставку данных и выполняем его
	$sql = "
	INSERT INTO
		msgs (name, email, msg)
	VALUES
		('$name','$email','$msg')
	";
	mysqli_query($link_db, $sql);
	
	// Перезапрашиваем страницу, чтобы избавиться от информации, переданной через форму
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

// Проверяем, был ли запрос на удаление записи
if(isset($_GET['del']) && is_numeric($_GET['del'])){
	// Фильтруем полученные данные. Но не обязательно, т.к. уже выполнялась проверка на числовое значение
	$del = $_GET['del'] * 1; 
	
	// Формируем SQL-оператор на удаление данных и выполняем его
	$sql = "DELETE FROM msgs WHERE id=$del";
	mysqli_query($link_db, $sql);
	
	// Перезапрашиваем страницу, чтобы избавиться от информации, переданной методом GET
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Гостевая книга</title>
</head>
<body>
	<h1>Гостевая книга</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		Ваше имя:<br>
		<input type="text" name="name"><br>
		Ваш E-mail:<br>
		<input type="text" name="email"><br> 
		Сообщение:<br>
		<textarea name="msg" cols="50" rows="5"></textarea><br>
		<br />
		<input type="submit" value="Добавить!">
	</form>

	<?php
	// Формируем SQL-оператор на выборку данных из БД и выполняем его
	$sql = "SELECT * FROM msgs ORDER BY id DESC";
	$res = mysqli_query($link_db, $sql);

	// Закрываем соединение с БД
	mysqli_close($link_db);

	// Получаем количество рядов результата выборки и выводим его
	$rows = mysqli_num_rows($res);
	print "<p>Записей в гостевой книге: $rows</p>";

	// В цикле выводим все сообщения
	while($row = mysqli_fetch_assoc($res)){
		$id = $row['id'];
		$name = $row['name'];
		$email = $row['email'];
		$msg = nl2br($row['msg']);
		
		print <<<HTML
		<hr>
		<p><b><a href="mailto:$email">$name</a></b><br>$msg</p>
		<p align="right"><a href="{$_SERVER['PHP_SELF']}?del=$id">Удалить</a></p>
HTML;
	}
	?>
</body>
</html>