<?php
	//创建mysqli对象实例
	$mysqli=new MYSQLi("localhost","question","questionadmin","questionnaire");
	if($mysqli->connect_error){die("连接失败").$mysqli->connect_error;}
	//创建预编译的对象实例
	$sql="select name from users where id>?;";
	$mysqli_stmt=$mysqli->prepare($sql);
	//绑定数据
	$id="133";
	$mysqli_stmt->bind_param("i",$id);
	//绑定结果集
	$mysqli_stmt->bind_result($name);
	//执行
	$mysqli_stmt->execute();
	//显示结果集
	while($mysqli_stmt->fetch()){
		echo "<br/>".$name;
	}
	$mysqli_stmt->free_result();
	$mysqli_stmt->close();
	$mysqli->close();
?>