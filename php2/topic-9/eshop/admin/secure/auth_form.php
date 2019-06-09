<?php
	include_once("../../top.inc.php");
?>
<h1>Вход в панель управления</h1>
<form action="logining.php" method="POST">
Логин <input type="text" size="20" name="login"><br><br>
Пароль <input type="password" size="18" name="password"><br><br>
<input type="submit" value="Войти в аккаунт">
</form>
<?php
	include_once("../../bottom.inc.php");
?>