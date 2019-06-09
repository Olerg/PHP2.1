<?php
// запуск сессии
session_start();
/*
	Задание 1
	Проверьте сессионную переменную admin. Если она не существует, тогда переадресуйте на secure/auth_form.php
*/
if (!isset($_SESSION['admin'])) {
	header("Location: secure/auth_form.php");
	exit;
}

/*
	Задание 2
	Сравните значения сессионной переменной admin с текущим идентификатором сессии (или их md5-хеш коды, в зависимости от того как Вы сделали в login_ok). 
	Если они не совпадают, тогда переадресуйте на access-deny.php
	Иначе проверьте сессионную переменную login и запишите её в переменную $login
*/
if ($_SESSION['admin'] != md5(session_id()) ) {
	include("access-deny.php");
	exit;
}
else {
	if (isset($_SESSION['login'])) $login = trim(strip_tags($_SESSION['login']));
}

?>
