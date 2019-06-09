<?php
// Код для всех страниц - вывод информации о посещенных страницах

// Проверим, существует ли массив посещенных страниц в сессии
if(isset($_SESSION['pages'])){
	print '<h2>Список посещенных страниц</h2>';
	
	// Выводим в цикле все посещенные страницы
	print '<ol>';
	foreach ($_SESSION['pages'] as $page){
		echo '<li>', $page, '</li>';
	}
	print '</ol>';
}
?>