<?php
// запуск сессии
session_start();
/*
	Задание 1
	Проверьте сессионную переменную admin. Если она не существует, тогда переадресуйте на secure/auth_form.php
*/


/*
	Задание 2
	Сравните значения сессионной переменной admin с текущим идентификатором сессии (или их md5-хеш коды, в зависимости от того как Вы сделали в login_ok). 
	Если они не совпадают, тогда переадресуйте на access-deny.php
	Иначе проверьте сессионную переменную login и запишите её в переменную $login
*/

	$login ='';
?>
