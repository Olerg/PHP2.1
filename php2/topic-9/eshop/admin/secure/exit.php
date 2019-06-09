<?php
	session_start();
	session_destroy();
	include_once("../../top.inc.php");
	echo "<br><h1>Вы вышли из панели управления сайтом</h1><br>";
	echo "<a href='../index.php'>Войти в панель управления</a>";
	include_once("../../bottom.inc.php");	
?>