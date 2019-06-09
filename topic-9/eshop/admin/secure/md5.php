<!DOCTYPE html>
<!-- Скрипт для получения md5-хеша строки. Без фильтрации, т.к. использовать на localhost -->
<html>
<head>
	<meta charset="utf-8">
	<title>Хеширование MD5</title>
</head>

<body>
<h1>Хеширование MD5</h1>
<?php
if ( isset($_GET["str"])) $str = $_GET["str"]; else $str ="";
if ( isset($_GET["salt"])) $salt = $_GET["salt"]; else $salt ="";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
	Строка:	<input type="text" name="str" value="<?php echo $str; ?>"><br>
	Соль: <input type="text" name="salt" value="<?php echo $salt; ?>"><br>
	<input type="submit" value="MD5">
</form>
<?php
if ($str) {
	echo "<h2>Без соли: ", md5($str) ,"</h2>";
}
if ($salt) {
	echo "<h2>Соль до: ", md5($salt.$str) ,"</h2>";
	echo "<h2>Соль после: ", md5($str.$salt) ,"</h2>";
}
?>
</body>
</html>
