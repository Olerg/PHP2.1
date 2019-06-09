<?
$login = $_SERVER["PHP_AUTH_USER"];
$password = $_SERVER["PHP_AUTH_PW"];

if ($login and $password): 
	// Если пользователь прошел аутентификацию
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Базовая аутентификация</title>
</head>
<body>
<h1>Базовая аутентификация - RFC2617</h1>
Ваш логин: <?=$login?><br>
Ваш пароль: <?=$password?><br>
</body>
</html>
<? else: 
	// Пользователь не прошел аутентификацию!
	header("HTTP/1.0 401 Unauthorized");
	header("WWW-Authenticate: Basic realm=\"My Site\"");
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Доступ запрещен</title>
</head>
<body>
<h1>Доступ запрещен</h1>
</body>
</html>
<? endif ?>