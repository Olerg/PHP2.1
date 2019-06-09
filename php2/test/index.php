<?php
/*
ЗАДАНИЕ 1
- Подключите необходимые файлы, содержащие коды 
	верхней, нижней частей страницы и меню страницы в местах 
	обозначенными html-комментариями
	- Код верхней части страницы: top.html
	- Код нижней части страницы: bottom.html
	- Код меню страницы: menu.html
*/
?>		
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Шаблон сайта</title>
	<style>
		table {
			width: 100%;
		}
		table, td {
			border: 1px solid #000;
		}
		tr {
			vertical-align: top;
			text-align: center;
		}
		.menu {
			width: 20%;
			text-align: left;
		}
		.menu ul {
			list-style-type: none;
			line-height: 2em;		
		}
	</style>
</head>
<body>

<table>
<tr>
	<td colspan="2">
		<!-- Верхняя часть страницы -->	
	</td>
</tr>
<tr>
	<td class="menu">
		<!-- Меню -->
	</td>
	<td>
		<!-- Область основного контента -->
		<?php
		/*
		ЗАДАНИЕ 2
			- В зависимости от выбранного пункта меню, на этом месте
			  должно показываться содержимое файлов 
			  page1.html или page2.html, или page3.html 	
			- Не забудьте внести изменения в файл menu.html
		*/
		?>
	</td>
</tr>
<tr>
	<td colspan="2">
		<!-- Нижняя часть страницы -->
	</td>
</tr>
</table>

</body>
</html>