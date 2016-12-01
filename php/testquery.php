<?php
// 引入通用数据库连接
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect');

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