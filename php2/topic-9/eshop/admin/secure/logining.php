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


/*
	Задание 2
	- Получите из POST login и password
	- Отфильтруйте полученные данные
	- Используйте функцию login_ok
	- Если авторизация успешная, то перенаправьте на ../index.php
 	  Иначе перенаправьте на access-deny.php
*/


?>