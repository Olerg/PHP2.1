<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Форма передавала информацию
	$name = strip_tags($_POST["name"]);
	$age = $_POST["age"] * 1;
	
	// Сохранение в cookie
	setcookie("userName", $name);
	setcookie("userAge", $age);
}
else {
	// Чтение куки
	$name = strip_tags($_COOKIE["userName"]);
	$age = $_COOKIE["userAge"] * 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение состояния формы</title>
</head>

<body>
<h1>Сохранение состояния формы</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	Ваше имя:
	<input type="text" name="name" value="<?php echo $name; ?>"><br>
	Ваш возраст:
	<input type="text" name="age" value="<?php echo $age; ?>"><br>
	<input type="submit" value="Передать">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	if ($name and $age) {
		echo "<h1>Привет, $name</h1>";
		echo "<h3>Тебе $age лет</h3>";
	}
	else {
		echo "<h3>Заполните все поля!</h3>";
	}
}
?>
</body>
</html>
