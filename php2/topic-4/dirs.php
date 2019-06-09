<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Работа с директориями</title>
</head>
<body>

<?php 
function readDirs($dirName, $sign=""){
	if($dir=opendir($dirName)){
		while($name=readdir($dir)){
			if(($name=='.') or ($name=='..')){
				continue;
			} 
			if(is_dir($dirName."/".$name)){
				echo "<br>$sign <B>$dirName/$name</B>";
				readDirs($dirName."/".$name, $sign."-");
			}else{
				echo "<br> $sign $dirName/$name";
				$GLOBALS["size"] += filesize($dirName."/".$name);
			}
		} 
	}  
	closedir($dir);
 }
$size = 0;
readDirs(".");
echo "<h5>Размер $size байт</h5>";   
?>



</body>
<html>

