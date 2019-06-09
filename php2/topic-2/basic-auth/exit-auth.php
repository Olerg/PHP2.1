<?php
	header("HTTP/1.0 401 Unauthorized");
	header("WWW-Authenticate: Basic realm=\"My Site\"");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вы не авторизованы</title>
</head>
<body>
<h1>Вы не авторизованы</h1>
</body>
</html>