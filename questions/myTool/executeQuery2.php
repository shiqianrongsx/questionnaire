<?php
	require_once("dbTool_class.php");
	$dbTool=new dbTool();
	$sql2="update PartTwo510181199611266719 set answer='无' where formid=2 and questionid=26;";
	/*$sql="select * from users1";
	$result=$dbTool->execute_dql($sql);
	while($r=mysql_fetch_assoc($result)){
		foreach($r as $key=>$val){
			echo $key.'='.$val.'<br/>';
		}
	}*/
	/*for(int i=1;i<=26;i++){
		if((i=='2')||(i=='8')){
			$sql="update Basic142622199005074282 set answer='25' where formid=1 and questionid="i";";
			$result=$dbTool->execute_dml($sql);
		}
	}*/
	//$result1=$dbTool->execute_dml($sql1);
	$result2=$dbTool->execute_dml($sql2);
?>