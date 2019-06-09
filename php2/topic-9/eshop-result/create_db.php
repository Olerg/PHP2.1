<?php
// Создание структуры Базы Данных интернет-магазина
// Определите константы для подключени к базе данных
	define("DB_HOST", "localhost");
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "eshop");

	// Установите соединение с СУБД. Создайте БД для интернет-магазина. Выберите эту БД
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysqli_error());

$sql = 'CREATE DATABASE ' . DB_NAME;
mysqli_query($link, $sql) or die(mysqli_error($link));

mysqli_select_db($link, DB_NAME) or die(mysqli_error($link));

// Сформируйте запрос для создания таблицы catalog и выполните запрос
$sql = "
CREATE TABLE catalog (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear varchar(4) NOT NULL default '',
	price int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";

// Сформируйте запрос для создания таблицы basket и выполните запрос
mysqli_query($link, $sql) or die(mysqli_error($link));
$sql = "
CREATE TABLE basket (
	id int(11) NOT NULL auto_increment,
	orderid varchar(32) NOT NULL default '',
	goodsid int(11) NOT NULL default 0,
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
mysqli_query($link, $sql) or die(mysqli_error($link));

// Сформируйте запрос для создания таблицы orders и выполните запрос
$sql = "
CREATE TABLE orders (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear varchar(4) NOT NULL default '',
	price int(11) NOT NULL default 0,
	orderid varchar(32) NOT NULL default '',
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
mysqli_query($link, $sql) or die(mysqli_error($link));

// Закройте соединение с БД
mysqli_close($link);
echo '<meta charset="utf-8">';
echo '<p>Структура базы данных <b>'. DB_NAME. '</b> успешно создана!</p>';
?>
