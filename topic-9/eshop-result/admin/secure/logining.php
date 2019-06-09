<?php
session_start();
/*
	Задание 1
	Напишите функцию login_ok для проверки пользователя: входные параметры $login, $password
	- Подключите файл .htpassword
	- Используя функцию md5 получите хеш-код для введенных пользователем значений $login, $password
	- Если хеш-коды совпадают 
		-- Запишите в сессионную переменную admin идентификатор сессии (или его md5-хеш), 
		-- Запишите в сессионную переменную login имя пользователя, 
		-- Запишите в сессионную переменную time текущее время, 
		-- верните TRUE
	  Иначе FALSE
*/

// Функция проверки пользователя
function login_ok($login, $password) {
	require_once(".htpassword");
	if (array_key_exists(md5(SALTL.$login), $user)) {
		if ($user[md5(SALTL.$login)] == md5(SALTP.$password)) {
			$_SESSION['admin'] = md5(session_id());
			$_SESSION['login'] = $login;
			$_SESSION['time'] = time();
			return true;
		}
	}
	return false;
}

/*
	Задание 2
	- Получите из POST login и password
	- Отфильтруйте полученные данные
	- Используйте функцию login_ok
	- Если авторизация успешная, то перенаправьте на ../index.php
 	  Иначе перенаправьте на access-deny.php
*/

if (isset($_POST['login']) AND !empty($_POST['login']) AND isset($_POST['password']) AND !empty($_POST['password']) ) {
	$login = trim(stripslashes(strip_tags($_POST['login'])));
	$password = trim(stripslashes(strip_tags($_POST['password'])));
	if ( login_ok($login, $password) ) {
		header('Location: ../index.php');
		exit;
	}
	else header('Location: access-deny.php');
}
else header('Location: access-deny.php');
?>