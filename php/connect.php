<?php
	// 引用通用配置文件
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/config.php');
	// 与服务器建立连接 面向对象方法

	// $mysqlicn = new mysqli(IP,USER,PASSWORD);
	// // print_r($mysqlicn);
	// // 选择数据库
	// $mysqlicn -> select_db('article');

	// // 获取mysqli实例
	// $mysqlicn = new mysqli();
	// // 与数据库建立连接
	// $mysqlicn -> connect(IP,USER,PASSWORD);
	// // print_r($mysqlicn);
	// $mysqlicn -> select_db('article');

	// 获取MySQLI的实例 同时与数据库建立连接 同时选择好数据库
	$mysqlicn = @new mysqli(IP,USER,PASSWORD,'article');
	// 设置字符集
	$mysqlicn -> set_charset('utf8');
	// print_r($mysqlicn);
	if($mysqlicn -> connect_errno){
		die('Connect error:'. $mysqlicn -> connect_error);
	}


?>