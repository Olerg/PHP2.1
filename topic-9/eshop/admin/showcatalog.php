<?php
	// подключение библиотек
	require_once "../inc/db.inc.php";
	require_once "../inc/lib.inc.php";
	require_once("secure/library.php");
	require_once("secure/auth.php");
	AutoExit();
	include ("../top.inc.php");
?>
<a href='index.php'>Возврат в главное меню </a>
<h1>Каталог товаров</h1>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Удаление</th>
</tr>
<?php
	/*
	ЗАДАНИЕ 1
	- С помощью функции selectAll() получите выборку всех товаров
	- В цикле выведите все товары на экран
	- Значение ячейки "Удаление" оформите в виде гиперссылки на
	документ delete.php, добавив параметр id с идентификатором(поле id) товара
	*/
	

	
?>
</table>
<?php
	include ("../bottom.inc.php");
?>
