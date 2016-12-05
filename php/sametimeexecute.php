<?php
// 设置打印字符编码
header("content-type:text/html;charset=utf-8");
// 链接数据库 选择表空间 实例化
$mysqlicn = new mysqli('127.0.0.1','root','','article');
// 判定链接成功与否
if($mysqlicn->errno){
	die($mysqlicn->error);
}
// 设定字符集
$mysqlicn->set_charset("UTF8");
// 关闭自动提交
$mysqlicn->autocommit(FALSE);
// 设定MySQL指令
$sql = 'UPDATE account SET money=money-1000 WHERE username="king";';
// 请求数据库
$res = $mysqlicn -> query($sql);
$res_affect = $mysqlicn ->affected_rows;

// 设定MySQL指令
$sql1 = 'UPDATE account SET money=money+1000 WHERE username="queen";';
// 请求数据库
$res1 = $mysqlicn->query($sql1);
$res1_affect = $mysqlicn->affected_rows;

// 判定两条请求同时成功
if($res && $res_affect>0 && $res1 && $res1_affect>0){
	// 提交
	$mysqlicn -> commit();
	echo "转账成功";
	// 开启自动提交
	$mysqlicn -> autocommit(TRUE);
}else{
	// 回滚
	$mysqlicn->rollback();
	echo "转账失败";
}

// 关闭结果集
$mysqlicn -> close();
// 关闭连接
?>