<?php
/*
	Задание 1
	Напишите код функции ShowLogin, входной параметр $login
		- Получите ip пользователя (REMOTE_ADDR)
		- Выведите в браузер имя пользователя, время авторизации (хранится в сессионной переменной) и его IP
*/
function ShowLogin ($login) {
	$cur_ip = $_SERVER['REMOTE_ADDR'];
	echo "<h4>Вы вошли как <span class='color'>", $login, "</span> - ", date("d.m.Y H:i:s", $_SESSION['time']), 
	" с ip-адреса <span class='color'>", $cur_ip, "</span></h4>";
}

/*
	Задание 2
	Напишите код функции AutoExit
		- Переменной $timestand присвойте допустимое время не активности пользователя, в секундах
		- Переменной $curtime присвойте текущее время
		- Наидите разность $difftime между текущим временем и значением, которое хранится в сессионной переменной time
		- Если $difftime больше $timestand разрушьте все данные сессии, сообщите пользователю о необходимости авторизоваться заново и отобразите форму для авторизации. Завершите выполнение скрипта
		- Присвойте сессонной переменной time значение из $curtime
*/
function AutoExit() {
	$timestand = 180; // Время в секундах
	$curtime = time();
	$difftime = $curtime - $_SESSION['time'];
	if ($difftime > $timestand) {
		session_destroy();
		include("../top.inc.php"); 
		$timestandmin = $timestand / 60;
		echo "<h1>Время не активности более $timestandmin минут. Для продолжения работы необходимо авторизоваться</h1>";
		echo <<< FORM
<form action="secure/logining.php" method="POST">
Логин <input type="text" size="20" name="login"><br><br>
Пароль <input type="password" size="18" name="password"><br><br>
<input type="submit" value="Войти в аккаунт">
</form>
FORM;
		include("../bottom.inc.php");
		exit();
	}
	$_SESSION['time'] = $curtime;
}
?>