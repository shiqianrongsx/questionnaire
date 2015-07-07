<?php
	//创建mysqli对象实例
	$mysqli=new MYSQLi("localhost","question","questionadmin","questionnaire");
	if($mysqli->connect_error){die("连接失败").$mysqli->connect_error;}
	//创建预编译对象
	$sql="delete from users where name=?;";
	$mysqli_stmt=$mysqli->prepare($sql);
	//绑定数据
	$name="abc";
	$mysqli_stmt->bind_param("s",$name);
	//执行
	$b=$mysqli_stmt->execute();
	if(!$b){
		echo "执行失败".$mysqli_stmt->error;
	}else{
		echo "执行成功";
	}
	//关闭连接
	$mysqli->close();
	
?>