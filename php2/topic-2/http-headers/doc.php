<?php
	header("Content-type: application/doc");
	header("Content-Disposition:attachment; filename=\"header.doc\"");
	readfile('header.doc');
?>
