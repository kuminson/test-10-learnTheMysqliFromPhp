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
	// print_r($mysqlicn);
	if($mysqlicn -> connect_errno){
		die('Connect error:'. $mysqlicn -> connect_error);
	}

	// 设置字符集
	$mysqlicn -> set_charset('utf8');

	// 执行sql查询
// 	$sql = <<<FFF
// 	CREATE TABLE IF NOT EXISTS user(
// 		id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
// 		username VARCHAR(20) NOT NULL,
// 		password VARCHAR(32) NOT NULL,
// 		age TINYINT(3) UNSIGNED DEFAULT 18
// 	)
// FFF;
	// $sql = 'INSERT user(username,password) VALUES("queens1","queenst1"),("queens2","queenst2"),("queens3","queenst3"),("queens4","queenst4")';
	// $sql = 'UPDATE user SET age = age+10;';
	// $res = $mysqlicn ->query($sql);
	// if($res){
	// 	echo '成功插入第'.$mysqlicn->insert_id.'条数据<br/>';
	// 	echo '有'.$mysqlicn->affected_rows.'条记录被影响';
	// }else{
	// 	echo 'ERROR'.$mysqlicn->errno.':'.$mysqlicn->error;
	// }

	$sql = 'DELETE FROM user WHERE id>=3;';
	$res = $mysqlicn -> query($sql);
	if($res){
		echo '有'.$mysqlicn->affected_rows.'条数据被影响';
	}else{
		echo 'ERROR'.$mysqlicn->errno.':'.$mysqlicn->error;
	}

	// 关闭连接
	$mysqlicn -> close();

?>