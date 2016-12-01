<?php
// 引入通用连接服务器配置
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
// 请求数据
$sql = "SELECT * FROM user;";
$result = $mysqlicn ->query($sql);
// 判定请求结果
if($result && $result->num_rows >0){
	// 输出数据
	echo json_encode(['success'=>'success','data'=>$result->fetch_all(MYSQLI_ASSOC)]);
}else{
	// 输出错误信息
	echo json_encode(['error'=>$result->errno.":".$result->error]);
}

// 释放结果集
$result->close();
// 关闭连接
$mysqlicn->close();
?>