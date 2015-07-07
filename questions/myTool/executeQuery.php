<?php
	require_once("dbTool_class.php");
	$dbTool=new dbTool();

	/*$sql="select * from users1";
	$result=$dbTool->execute_dql($sql);
	while($r=mysql_fetch_assoc($result)){
		foreach($r as $key=>$val){
			echo $key.'='.$val.'<br/>';
		}
	}*/
			$sql="insert PartTwo41152819941207341x(formid,questionid,answer) value(11,2,C);";
			$result=$dbTool->execute_dml($sql);

	//$result1=$dbTool->execute_dml($sql1);
	//$result2=$dbTool->execute_dml($sql2);
?>