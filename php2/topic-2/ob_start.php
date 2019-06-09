<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ob_start</title>
</head>
<body>	
<?
	print("На данный момент ");
	$bufer = strlen(ob_get_contents());
	print($bufer);
	print(" символов в буфере.<BR>\n");
?>
</body>
</html>
<?
	header("X-Custom-Header: PHP");
	setcookie("bufer", $bufer);

	ob_end_flush();
?>
