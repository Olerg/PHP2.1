<?php
	// Пользовательская функция для выполнения запросов
	function my_query($sql){
		global $link_db;
		$result = mysqli_query($link_db, $sql) or die('<p>Ошибка: '.mysqli_error($link_db).'</p>');
		return $result;
	}
	
	/*
	ЗАДАНИЕ 1
	- Опишите функцию save(), сохраняющую новый товар в таблицу catalog
	- Функция должна принимать следующие значения:
			author
			title
			pubyear
			price

	*/
	function save($author, $title, $pubyear, $price) {
		$sql = "INSERT INTO catalog (`author`, `title`, `pubyear`, `price`)
			VALUES ('".$author."', '".$title."', '".$pubyear."', '".$price."')";
		my_query($sql);
	}

	/*
	ЗАДАНИЕ 2
	- Опишите функцию selectAll(), возвращающую все содержимое каталога товаров
	*/
	function selectAll() {
		$res =  my_query("SELECT * FROM catalog");
		return $res;
	};
	 
	function select_show_All() {
		$res =  my_query("SELECT * FROM catalog");
		echo "<h1>Каталог товаров</h1>";
		echo "<table border='1'><tr>";
		$row = mysqli_fetch_assoc($res);
		foreach ($row as $key => $val) echo "<th>$key</th>";	
		echo "</tr>";
		
		mysqli_data_seek($res, 0);
		while ($row = mysqli_fetch_assoc($res)) {
			echo "<tr>";
			foreach ($row as $key => $val) echo "<td>$val</td>";	
			echo "</tr>";
		};
		echo "</table>\n";
	};
	

	
	/*
	ЗАДАНИЕ 3
	- Опишите функцию add2basket(), которая будет добавлять товары в корзину пользователя
	- Функция должна принимать следующие значения:
			orderid
			goodsid
			quantity
			datetime
	*/
	function add2basket ($orderid, $goodsid, $quantity, $datetime){
		$sql = "INSERT INTO basket (`orderid`, `goodsid`, `quantity`, `datetime`) 
			VALUES ('".$orderid."', '".$goodsid."', '".$quantity."', '".$datetime."')";
		my_query($sql);
	}
	/*
	ЗАДАНИЕ 4
	- Опишите функцию myBasket(), которая будет возвращать всю пользовательскую корзину в виде массива
	*/

	function myBasket($orderid){
		$array_select = array();
		$i = 0;
		$sql = "SELECT * FROM basket WHERE `orderid` = '$orderid'";
		$res = my_query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
			$goodsid = $row['goodsid'];
			$sql = "SELECT `author`, `title`, `price`, `pubyear` FROM catalog WHERE `id`='".$goodsid."'";
			$res_book = my_query($sql);
			$i = $i + 1;
			$array_select[$i]['orderid'] = $orderid;
			$array_select[$i]['quantity'] = $row['quantity'];
			while ($row_book = mysqli_fetch_assoc($res_book)) {
				$array_select[$i]['author'] = $row_book['author']; 
				$array_select[$i]['title'] = $row_book['title'];
				$array_select[$i]['pubyear'] = $row_book['pubyear'];
				$array_select[$i]['price'] = $row_book['price'];
			}
		}
		return $array_select;
	}
	

	/*
	ЗАДАНИЕ 5
	- Опишите функцию myBasket_show(), которая будет возвращать всю пользовательскую корзину с выводом в браузер

	- Получите все товары из корзины пользователя в виде массива
	- Создайте переменные для подсчета порядковых номеров ($i) и общей суммы заказа ($cost)
	- В цикле выводите все позиции из корзины на экран
	- Также, в цикле увеличивайте значение переменной $cost на соответствующее значение (сумма текущего товара * его количество)
	- Значение ячейки "Удалить" оформите в виде гиперссылки на документ delete_from_basket.php, добавив параметр id с id товара	
	*/

	function myBasket_show($orderid){
		$cost = 0;
		$i = 0;
		$sql = "SELECT * FROM basket WHERE `orderid` = '$orderid'";
		$res = my_query($sql);
		echo "<h1>Корзина товаров</h1>";
		echo "<table border='1'>";
		echo "<tr><th>№ п/п</th><th>Автор</th> <th>Название</th> <th>Год изд.</th> <th>Цена</th> <th>Количество</th> <th>Дата/время</th> <th>Удалить</th></tr>";
		while ($row = mysqli_fetch_assoc($res)) {
			$goodsid = $row['goodsid'];
			$sql = "SELECT `author`, `title`, `price`, `pubyear` FROM catalog WHERE `id`='".$goodsid."'";
			$res_book = my_query($sql);
			 $quantity = $row['quantity'];
			echo "<tr>";
			$i = $i + 1;
			echo "<td>", $i, "</td>";	
			while ($row_book = mysqli_fetch_assoc($res_book)) {
				echo "<td>", $row_book['author'], "</td>";	
				echo "<td>", $row_book['title'], "</td>";	
				echo "<td>", $row_book['pubyear'],"</td>";	
				echo "<td>", $row_book['price'],"</td>";	
				$price = $row_book['price'];
			}
			echo "<td>", $row['quantity'], "</td>";	
			echo "<td>", date("d.m.Y H:i", $row['datetime']), "</td>";	
			echo "<td><a href='delete_from_basket.php?id=$goodsid'>Удалить</a></td>";	
			echo "</tr>";
			$cost = $cost + $price * $quantity;	
		};
		echo "</table>\n";	
		return $cost;
	}
	
	/*
	ЗАДАНИЕ 6
	- Опишите функцию basketDel(), которая будет удалять товар из корзины пользователя
	- Функция должна принимать следующие значения:
			id
	*/
	function basketDel($id){
		$sql = "DELETE FROM basket WHERE `goodsid`='".$id."'";
		my_query($sql);
	
	}
	
	/*
	ЗАДАНИЕ 7
	- Опишите функцию resave() для пересохранения товаров из корзины (таблица basket) в заказы (таблица orders)
	- Функция должна принимать следующие значения:
			datetime – дата заказа 
	- Для получения содержимого корзины в этой функции воспользуйтесь функцией myBasket()
	- Опишите в функции resave() SQL-оператор, который будет вставлять данные из корзины в таблицу orders и выполните его
	- Опишите SQL-оператор для удаления данных о корзине текущего покупателя из таблицы basket
	*/
	function resave($orderid){
		$datetime = time();
		$basket = myBasket($orderid);
		foreach ($basket as $key => $val) {
			$author = $val['author'];
			$title = $val['title'];
			$pubyear = $val['pubyear'];
			$price = $val['price'];
			$quantity = $val['quantity'];
			$sql = "INSERT INTO orders 
				(`author`, `title`, `pubyear`, `price`, `orderid`, `quantity`, `datetime`) 
				VALUES ('".$author."', '".$title."', '".$pubyear."', '".$price.
				"', '".$orderid."', '".$quantity."', '".$datetime."')";
			my_query($sql);
		}
		$sql = "DELETE FROM basket WHERE `orderid` = '$orderid'";
		my_query($sql);
	}
	
	/*
	ЗАДАНИЕ 8
	- Опишите функцию getOrders() для получения информации о заказах
	- Получите в виде массива $orders данные о пользователях из файла "orders.log"
	- Создайте массив $allorders для хранения информации обо всех заказах
	- В цикле foreach переберите все заказы
	- Внутри цикла foreach создайте ассоциативный массив $orderinfo для хранения информации о каждом конкретном заказе
	- Сохраните информацию о пользователе из массива $orders(name, email, phone, address, orderid, date) в массиве $orderinfo
	- Опишите SQL-оператор для выборки из таблицы заказов всех товаров для конкретного покупателя
	- Получите весь результат этой выборки
	- Сохраните полученный в предыдущем пункте результат как значение
		ключа "goods" в массиве $orderinfo
	- Добавьте сформированный массив $orderinfo в виде значения очередного ключа массива $allorders
	- Функция getOrders() должна возвращать массив $allorders с информацией о всех покупателях
		и сделанных ими заказах
	*/
	function getOrders() {
		if (!file_exists('../'.ORDERS_LOG)) return $allorders = array(); 
		$orders = file('../'.ORDERS_LOG);
		$i = 0;
		foreach ($orders as $val) {	
			$i = $i + 1;
			$record = explode("|", $val);
			$orderinfo['name'] = $record[0];
			$orderinfo['email'] = $record[1];
			$orderinfo['phone'] = $record[2];
			$orderinfo['address'] = $record[3];
			$orderinfo['time'] = $record[4];
			$orderinfo['orderid'] = $record[5];
		
			$str = "SELECT * FROM orders WHERE datetime='".$orderinfo['time']."'";
			$res = my_query($str);
			unset($rows);
			while ($row = mysqli_fetch_assoc($res)) {
				$rows[] = $row;
			}
			$orderinfo['goods'] = $rows;
			
			$allorders[$i] = $orderinfo;
		}
		return $allorders;
	}

?>