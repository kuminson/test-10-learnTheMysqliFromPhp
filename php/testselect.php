<?php
// 引入通用连接数据库设置
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
// mysql语句
$sql = 'SELECT * FROM user;';
// 请求服务器
$result = $mysqlicn->query($sql);
// print_r($result);
if($result && $result->num_rows>0){
	// print_r($result->num_rows);
	// print_r($result->fetch_all());
	// print_r($result->fetch_all(MYSQLI_ASSOC));
	print_r($result->fetch_row());
	print_r($result->fetch_assoc());
	print_r($result->fetch_array());
	print_r($result->fetch_object());
	$result->data_seek(0);
	print_r($result->fetch_assoc());
	echo '<hr/>';
	$result->data_seek(0);
	while($row = $result->fetch_assoc()){
		print_r($row);
		echo '<hr color="red"/>';
	}
	// 释放结果集
	// $result->free();
	// $result->result_free();
	$result->close();
}else{
	echo "连接失败，或者结果集中没有数据";
}

$mysqlicn->close();
?>