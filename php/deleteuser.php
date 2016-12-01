<?php
// 引用通用数据库连接
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
// 判定有误传值
if(count($_REQUEST) && array_key_exists('id',$_REQUEST)){
	$id = $_REQUEST['id'];
}else{
	die(json_encode(["error"=>'传值有误']));
}

// 发送请求
$sql = "DELETE FROM user WHERE id=$id;";
$result = $mysqlicn->query($sql);
// 打印结果
if($result){
	echo json_encode(['success'=>'success']);
}else{
	echo json_encode(['error'=>$result->errno.':'.$result->error]);
}
// 关闭连接
$mysqlicn->close();
?>