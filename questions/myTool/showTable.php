<?php
	require_once('dbTool_class.php');
//定义函数
	function show_tab_info($tab_name){
		$sql="select * from ".$tab_name;
		$dbTool=new dbTool();
		$result=$dbTool->execute_dql($sql);
		//显示字段名
		echo "<table><tr>";
		for($i=0;$i<4;$i++){
		echo "<th>";
		$fName=mysql_field_name($result,$i);
		echo $fName;
		echo "</th>";
		}
		echo "</tr>";		
		//显示信息
		while($res=mysql_fetch_row($result)){
			echo "<tr>";
			for($i=0;$i<4;$i++){
				echo "<td>".$res[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "<table>";
	}
//表名
	$tab_name="users";
//调用函数
	show_tab_info($tab_name);
?>