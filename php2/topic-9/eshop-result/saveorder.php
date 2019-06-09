<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require_once "inc/db.inc.php";
	require_once "inc/lib.inc.php";
	/*
	ЗАДАНИЕ 1
	- получите из формы и обработайте данные заказа
	
	ЗАДАНИЕ 2
	- создайте переменную $order
	- создайте строку из полученных данных, разделяя их символом "|", например: "Иван Иванов|ivan@mail.ru|123-12-23|Москва, Сумской пр-д 17 кв.105"
	- присвойте созданную строку переменной $order
	- запишите значение переменной $order в файл orders.log
	  ВНИМАНИЕ: в зависимости от того, каким образом будет производиться работа с файлом, возможно, будет необходимо проверить существование файла orders.log. Новые данные должны записываться в конец файла!
	- сохраните файл  
	
	ЗАДАНИЕ 3
	- вызовите функцию resave() для пересохранения купленных товаров из корзины
		в таблицу orders
	*/
	$orderid = session_id();
	if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['address'])) {
		$name = trim(strip_tags($_POST['name']));
		$email = trim(strip_tags($_POST['email']));
		$phone = trim(strip_tags($_POST['phone']));
		$address = trim(strip_tags($_POST['address']));
		$order = $name."|".$email."|".$phone."|".$address."|".time()."|".$orderid."\r\n";
		$f = fopen(ORDERS_LOG, "a");
		fwrite($f, $order);
		fclose($f);
		
		resave($orderid);
	}
	
	
	
	include ("top.inc.php");
?>
	<h1>Сохранение данных заказа</h1>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Каталог товаров</a></p>
<?php
	include ("bottom.inc.php");
?>	
