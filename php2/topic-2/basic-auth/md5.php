<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Хеширование MD5</title>
</head>

<body>
<h1>Хеширование md5 и crypt</h1>
<?
$str = $_GET["str"]; // В демонстрационном примере входные данные не отфильтрованы
$salt = $_GET["salt"]; // В демонстрационном примере входные данные не отфильтрованы
?>
<form action="<?=$_SERVER["PHP_SELF"]?>">
	Строка:
	<input type="text" name="str" value="<?=$str?>"><br>
	Соль:
	<input type="text" name="salt" value="<?=$salt?>"><br>
	<input type="submit" value="   MD5   ">
</form>
<?
if ($str) {
	echo "<h2>MD5 только строка: ", md5($str) ,"</h2>";
	echo "<h2>crypt только строка (соль автоматически): ", crypt($str) ,"</h2>";
}
if ($str and $salt) {
	echo "<h2>MD5 cтрока и соль: ", md5($str.$salt) ,"</h2>";
	echo "<h2>crypt алгоритм DES соль 2 символа: ", crypt($str, $salt) ,"</h2>";
	echo "<h2>crypt алгоритм MD5 соль $1$ плюс до 8 символов: ", crypt($str, '$1$'.$salt) ,"</h2>";
}
?>
</body>
</html>
