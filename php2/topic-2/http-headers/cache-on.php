<?php
header("Cache-control: public");
header("Expires: " . date("r", time() + 10));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Разрешение кеширования</title>
</head>

<body>
<h1>Разрешение кеширования на 10 секунд</h1>
<h1><?=date("H:i:s")?></h1>

</body>
</html>
