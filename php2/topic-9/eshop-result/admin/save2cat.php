<?php
	// подключение библиотек
	require_once "../inc/db.inc.php";
	require_once "../inc/lib.inc.php";
	require_once("secure/library.php");
	require_once("secure/auth.php");
	AutoExit();

	/*
	ЗАДАНИЕ 1
	- Получите и отфильтруйте данные из формы
	
	ЗАДАНИЕ 2
	- Вызовите функцию save() для сохранения нового товара в БД
	
	ЗАДАНИЕ 3
	- Переадресуйте пользователя на страницу добавления нового товара (add2cat.php)
	*/
	if (! empty($_POST['author']) and ! empty($_POST['title']) and 
		! empty($_POST['pubyear']) and ! empty($_POST['price'])) {
		$author = trim(strip_tags($_POST['author']));
		$title = trim(strip_tags($_POST['title'])); 
		$pubyear = $_POST['pubyear'] * 1;
		$price = $_POST['price'] * 1;
		if ($pubyear > 1900 and $price > 0) {
			save($author, $title, $pubyear, $price);
			header("Location: add2cat.php");
		}
		else {
			include ("../top.inc.php");
			echo "<h1>Неправильно заполнены поля</h1>";
			echo "<a href='index.php'>Возврат в главное меню </a>";
			select_show_All();
			include ("../bottom.inc.php");
		}
	}
	else header("Location: add2cat.php");
?>