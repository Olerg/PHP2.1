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
	
	$orderid = session_id();
	$sql = "SELECT count(*) FROM basket WHERE `orderid` = '$orderid'";
	$res = my_query($sql);
	while ($row = mysqli_fetch_assoc($res)) {foreach($row as $key => $val) $count = $val;}
	if ($count > 0) {
		$sum = myBasket_show($orderid);
		echo "<h1>Всего товаров в корзине на сумму: $sum руб.</h1>";
?>
		<div align="center">
			<input type="button" value="Оформить заказ!" onClick="location.href='orderform.php'">
		</div>
<?php
	}
	else echo "<h1>Корзина пуста</h1>";
	include ("bottom.inc.php");
?>






