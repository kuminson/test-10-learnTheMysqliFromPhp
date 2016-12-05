<?php
	// 前端显示编码设置
	header("Content-type:text/html;charset=utf-8");
	// 链接数据库 选择表空间 实例化
	$mysqlicn = new mysqli('127.0.0.1','root','','article');
	// 设置字符集
	$mysqlicn->set_charset('UTF8');
	// 设置预处理语句
	$sql = "SELECT * FROM user WHERE username=? AND password=?;";
	$stmt = $mysqlicn->prepare($sql);
	// print_r($stmt);
	$user = "princess4";
	$pass = md5("princess4");
	// 绑定预处理语句
	$stmt->bind_param('ss',$user,$pass);

	// 执行预处理语句
	if($stmt->execute()){
		$stmt->store_result();
		if($stmt ->num_rows>0){
			echo "存在";
		}else{
			echo "不存在";
		}
	}else{
		echo $stmt->error;
	}

	// 释放结果集
	$stmt->free_result();
	// 关闭预处理语句
	$stmt->close();
	// 关闭连接
	$mysqlicn -> close();
?>