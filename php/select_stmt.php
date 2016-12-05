<?php
// 前端输出编码格式
header("content-type:text/html;charset=utf-8");
// 链接数据库 选择表空间 实例化
$mysqlicn = new mysqli('127.0.0.1','root','','article');
// 设置字符集
$mysqlicn -> set_charset("UTF8");
// 设置预处理语句
$sql = "SELECT id,username,age FROM user WHERE id>?;";
$stmt = $mysqlicn->prepare($sql);
// 绑定预处理语句参数
$id = 3;
$stmt->bind_param("i",$id);
// 运行预处理语句
if($stmt -> execute()){
	// 绑定结果集的值到变量
	$stmt -> bind_result($num,$username,$age);
	// 获取结果集
	while($stmt -> fetch()){
		// 输出结果
		echo "编号".$num."<br/>";
		echo "用户名".$username."<br/>";
		echo "年龄".$age."<br/>";
		echo "<hr/>";
	}
}
// 释放结果集
$stmt->free_result();
// 释放预处理语句
$stmt->close();
// 关闭链接
$mysqlicn->close();
?>