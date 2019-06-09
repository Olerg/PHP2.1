<?php
	require_once "../inc/db.inc.php";
	require_once "../inc/lib.inc.php";
	require_once("secure/library.php");
	require_once("secure/auth.php");
	AutoExit();
	include ("../top.inc.php");
?>
<a href='index.php'>Возврат в главное меню </a>
<h1>Поступившие заказы:</h1>
<?php
/*
ЗАДАНИЕ 1
- вызовите функцию getOrders() и сохраните результат её работы
	в переменную
- используя цикл foreach выведите информацию обо всех заказах,
	используя указанную ниже шапку
*/

	// Начало
?>
<hr>
<p><b>Заказчик</b>: <?= $val['name'] ?></p>
<p><b>Email</b>: <?= $val['email'] ?></p>
<p><b>Телефон</b>: <?= $val['phone'] ?></p>
<p><b>Адрес доставки</b>: <?= $val['address'] ?></p>
<p><b>Дата размещения заказа</b>: <?= date('d.m.Y H:i', $val['time']) ?></p>
<h3>Купленные товары:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
</tr>
<?php

	// Вывод

?>

</table>
<p>Всего товаров в заказе на сумму: <?= $cost ?> руб.

<?php
	} // Конец
	include ("../bottom.inc.php");
?>