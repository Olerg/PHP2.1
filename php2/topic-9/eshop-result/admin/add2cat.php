<?
	require_once("secure/library.php");
	require_once("secure/auth.php");
	AutoExit();
	include ("../top.inc.php");
?>
	<a href='index.php'>Возврат в главное меню </a>
	<h1>Добавление новой книги в каталог</h1>
	<form action="save2cat.php" method="POST">
		<p>Название: <input type="text" name="title" size="90">
		<p>Автор: <input type="text" name="author" size="50">
		<p>Год издания: <input type="text" name="pubyear" size="4">
		<p>Цена: <input type="text" name="price" size="6"> руб.
		<p><input type="submit" value="Добавить">
	</form>
<?php
	include ("../bottom.inc.php");
?>