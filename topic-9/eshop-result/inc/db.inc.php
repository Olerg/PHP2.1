<?php
	/*
	������� 1
	�������� ��������� DB_HOST �� ��������� localhost� ��� �������� ������ ������� ��� ������ MySQL
	�������� ��������� DB_LOGIN �� ��������� root ��� �������� ������ ���������� � �������� ��� ������ MySQL
	�������� ��������� DB_PASSWORD �� ��������� '������ ������' ("") ��� �������� ������ ���������� � �������� ��� ������ MySQL
	�������� ��������� DB_NAME �� ��������� eshop ��� �������� ����� ���� ������
	�������� ��������� ORDERS_LOG �� ��������� �rders.log ��� �������� ����� ����� � ������� ������� �������������
	�������� ������ ������ $basket ��� �������� ������� ������������
	�������� ���������� $count �� ��������� 0 ��� �������� ���������� ������� � ������� ������������
	���������� ���������� � �������� ���� ������ MySQL, ������ ����������� ��� ������ ���� ������. �� �������� ��������� ��������� ������!
	*/
	define("DB_HOST", "localhost");
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "eshop");
	define("ORDERS_LOG", "�rders.log");
	$count = 0;
	$basket = array();
	
	$link_db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_error());
?>