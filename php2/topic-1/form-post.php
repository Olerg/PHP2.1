<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Форма передавала информацию
	$name = strip_tags($_POST["name"]);
	$age = $_POST["age"] * 1;
	
	// Обработка формы
	// ... 
	
	// Сохранение в cookie
	if ($name != '' and $age > 0) {
		setcookie("formOk", 'yes');
		setcookie("userName1", $name);
		setcookie("userAge1", $age);
		$users = unserialize($_COOKIE["users"]);
		$users[] = array('name' => $name, 'age' => $age);
		$str = serialize($users);
		setcookie("users", $str);
	}
	else setcookie("formOk", 'no');
	
	// перезапрос формы методом GET
	header("Location: " . $_SERVER["PHP_SELF"]);
	exit;
}
else {
	// Чтение куки
	$name = strip_tags($_COOKIE["userName1"]);
	$age = $_COOKIE["userAge1"] * 1;
	$users = unserialize($_COOKIE["users"]);
	$formOk = $_COOKIE["formOk"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Очистка буфера POST</title>
</head>

<body>
<h1>Очистка буфера POST</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	Ваше имя:
	<input type="text" name="name" value="<?php echo $name; ?>"><br>
	Ваш возраст:
	<input type="text" name="age" value="<?php echo $age; ?>"><br>
	<input type="submit" value="Передать">
</form>
<?php
	if ($formOk == 'no') echo "<h2>Заполните все поля!</h2>";
	if ($name != '' and $age > 0) {
		echo "<p>Привет, $name</p>";
		echo "<p>Тебе $age лет</p>";
	}
	if ($users) {
		echo '<h2>Все пользователи</h2><pre>';
		print_r($users);
		echo '</pre>';
	}
?>
</body>
</html>
