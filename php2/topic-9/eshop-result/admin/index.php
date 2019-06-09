<?
	require_once("secure/library.php");
	require_once("secure/auth.php");
	AutoExit();
	include ("../top.inc.php");
	
	echo '<h1>Администрирование магазина</h1>';
	ShowLogin ($login);
?>	
	<h2>Доступные действия:</h2>
	<ul>
		<li><a href='showcatalog.php'>Просмотр каталога</a></li>
		<li><a href='add2cat.php'>Добавление товара в каталог</a></li>
		<li><a href='orders.php'>Просмотр готовых заказов</a></li>
		<li><a href='secure/exit.php'>Завершить сеанс</a></li>
	</ul>
<?php
	include ("../bottom.inc.php");
?>
