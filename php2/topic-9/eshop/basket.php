<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require_once "inc/db.inc.php";
	require_once "inc/lib.inc.php";
	include ("top.inc.php");	
	echo '<h1>Ваша корзина</h1>';

	/*
	ЗАДАНИЕ 1
	- Проверьте, есть ли товары в корзине пользователя
	- Если товаров нет, выводите строку "Корзина пуста!"
	- Если товары есть, выводите их с помощью функции myBasket_show
	*/

	/*
	ЗАДАНИЕ 2
	- Выведите общую сумму товаров в корзине
	*/
	
	echo "<a href='catalog.php'>Каталог товаров</a>";
	
	
	include ("bottom.inc.php");
?>






