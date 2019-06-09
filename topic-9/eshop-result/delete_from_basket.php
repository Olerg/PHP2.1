<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require_once "inc/db.inc.php";
	require_once "inc/lib.inc.php";
	
	/*
	ЗАДАНИЕ 1
	- Получите идентификатор конкретного покупателя
	- Получите идентификатор удаляемого товара
	- Вызовите функцию basketDel() для данного товара
	- Переадресуйте пользователя на корзину заказов
	*/
	$customer = session_id();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		basketDel($id);
	}
	header("Location: basket.php");
?>