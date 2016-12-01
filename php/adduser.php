<?php
// 引入通用连接数据库配置
require_once($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
// 获取数据
if(count($_REQUEST)){
	$username = $_REQUEST['username'];
	$username = $mysqlicn -> escape_string($username);
	$password = $_REQUEST['password'];
	$age = $_REQUEST['age'];
}
// 传入数据
$sql = "INSERT INTO user(username,password,age) VALUES('$username','$password','$age');";
if($result = $mysqlicn ->query($sql)){
	echo '<script>alert("加载成功"); window.location.href= "/html/usernametable.html"</script>';
}else{
	echo '<script>alert("加载失败"); window.location.href= "/html/usernametable.html"</script>';
}
// 释放结果集
$result ->close();
// 关闭连接
$mysqlicn ->close();

?>