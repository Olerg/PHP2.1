<?php
	header("Content-type: application/xls");
	header("Content-Disposition:attachment; filename=\"summa.xls\"");
	readfile('summa.xls');
?>