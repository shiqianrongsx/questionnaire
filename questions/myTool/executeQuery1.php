<?php
	require_once("dbHelper.php");
	$dbHelper=new dbHelper();
	$sql="select * from users1";
	$result=$dbHelper->executedql($sql);
	while($res=$result->fetch_row()){
		foreach($res as $key=>$val){
			echo $val."&nbsp&nbsp&nbsp";
		}
		echo "<br/>";
	}
	$result->free();
	/*$sql="delete from users1 where id=4";
	$dbHelper->executedml($sql);*/
?>