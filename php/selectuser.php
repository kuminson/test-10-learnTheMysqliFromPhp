<?php
// 引入通用数据库连接
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
// 访问数据库
$uid = $_REQUEST['id'];
$sql = "SELECT * FROM user WHERE id=$uid;";
$result = $mysqlicn ->query($sql);
if($result && $result->num_rows>0){
	// 返回结果
	echo json_encode($result->fetch_assoc());
}
// 释放结果集
$result->close();
// 关闭连接
$mysqlicn ->close();
?>