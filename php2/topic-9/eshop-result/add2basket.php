<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require_once "inc/db.inc.php";
	require_once "inc/lib.inc.php";
	/*
	ЗАДАНИЕ 1
	- Получите идентификатор конкретного покупателя
	- Получите идентификатор товара, добавляемого в корзину
	- Назначьте количество добавляемого товара равным 1
	- Получите дату добавления товара в корзину (текущую дату)
		в формате UNIX timestamp
	- Добавьте товар в корзину, используя функцию add2basket
	- Переадресуйте пользователя на каталог товаров
	*/	
	
	$customer = session_id();

	if (isset($_GET['id'])) {
		$goodsid = $_GET['id'] * 1;
		$quantity = 1;
		$datetime = time();
		add2basket ($customer, $goodsid, $quantity, $datetime);
		header("Location: catalog.php");
	}
?>