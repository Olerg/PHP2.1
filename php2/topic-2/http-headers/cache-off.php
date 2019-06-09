<?php
header("Cache-control: no-store");
header("Expires: " . date("r"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Запрет кеширования</title>
</head>

<body>
<h1>Запрет кеширования</h1>
<h1><?=date("H:i:s")?></h1>

</body>
</html>
