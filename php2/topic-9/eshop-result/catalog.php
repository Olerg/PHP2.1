<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require_once "inc/db.inc.php";
	require_once "inc/lib.inc.php";
	include ("top.inc.php");

/*
ЗАДАНИЕ 1
- Выведите в этом месте строку "Товаров в корзине: "
	и текущее количество товаров в корзине для
	данного пользователя
- Слово "корзине" оформите в виде гиперссылки на
	документ basket.php
*/

	$orderid = session_id();
	$sql = "SELECT count(*) FROM basket WHERE `orderid`='".$orderid."'";
	$res = my_query($sql);
	while ($row = mysqli_fetch_assoc($res)) {foreach($row as $key => $val) $count = $val;}
	echo "<h1>Товаров <a href='basket.php'>в корзине</a>: $count</h1>";
	
?>
<h1>Каталог товаров</h1>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
	/*
	ЗАДАНИЕ 2
	- С помощью функции selectAll() получите выборку всех товаров
	- В цикле выведите все товары на экран
	- Значение ячейки "В корзину" оформите в виде гиперссылки на
	документ add2basket.php, добавив параметр id с идентификатором(поле id) товара
	*/
	$res = selectAll();	
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<tr>";
		foreach ($row as $key => $val) {
			if ($key != "id") echo "<td>$val</td>"; else $id = $val;
		}
			echo "<td><a href='add2basket.php?id=$id'>Добавить</a></td>";
		echo "</tr>";
	}
?>
</table>
<?php
	include ("bottom.inc.php");
?>
