<?php
// 客户端编码显示
header('Content-type:text/html; charset=utf-8');
// 实例化mysqli函数 连接数据库 选择表空间
$mysqlicn = new mysqli('127.0.0.1','root','','article');
// 判断是否连接成功
if($mysqlicn->errno){
	die('connect error:'.$mysqlicn->error);
}
// 设置字符集
$mysqlicn->set_charset('UTF8');

$sql = "SELECT * FROM user;";
$sql .= "SELECT * FROM test.table1;";
if($back = $mysqlicn->multi_query($sql)){
	// do{
	// 	if($result = $mysqlicn->store_result()){
	// 		$row[] = $result->fetch_all(MYSQLI_ASSOC);
	// 	}
	// }while($mysqlicn->more_results() && $mysqlicn->next_result());
	if($result = $mysqlicn -> store_result()){
		$row[] = $result->fetch_all(MYSQLI_ASSOC);
		$mysqlicn->next_result();
		$result = $mysqlicn->store_result();
		$row[] = $result->fetch_all(MYSQLI_ASSOC);
		
	}
}else{
	echo $mysqlicn ->error;
}
print_r($row);

$mysqlicn ->close();

?>