<?php
// Создание структуры Базы Данных гостевой книги

define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "guest");

$link_db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysqli_error());

$sql = "CREATE DATABASE ".DB_NAME;
mysqli_query($link_db, $sql) or die(mysqli_error($link_db));

mysqli_select_db($link_db, DB_NAME) or die(mysqli_error($link_db));

mysqli_query($link_db, "SET NAMES 'utf-8'");

$sql = "
CREATE TABLE msgs (
	id int(11) NOT NULL auto_increment,
	name varchar(50) NOT NULL default '',
	email varchar(50) NOT NULL default '',
	msg TEXT,
	PRIMARY KEY (id)
)";
mysqli_query($link_db, $sql) or die(mysqli_error());

mysqli_close($link_db);

echo '<p>Структура базы данных <b style="color:#F00;">'.DB_NAME.'</b> успешно создана!</p>';
?>