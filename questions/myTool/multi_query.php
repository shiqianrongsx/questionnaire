<?php
	$mysqli=new MYSQLi("localhost","question","questionadmin","questionnaire");
	if($mysqli->connect_error) {die("连接失败").$mysqli->connect_error;}           
	$sql="select * from users;";
	$sql.="select * from users1;";
	if($result=$mysqli->multi_query($sql)){
		do{
			$res=$mysqli->store_result();//转移从上次查询的结果集
			while($row=$res->fetch_row()){
				foreach($row as $key=>$val){
					echo $val;
				}
				echo "<br/>";
			}
			$res->free();
			if(!$mysqli->more_results()){die();}
			echo "新的结果集<br/>";
		}while($mysqli->next_result());
		/*while($mysqli->next_result()){
			$res=$mysqli->store_result();//转移从上次查询的结果集
			while($row=$res->fetch_row()){
				foreach($row as $key=>$val){
					echo $val;
				}
				echo "<br/>";
			}
			$res->free();
			if(!$mysqli->more_results()){die();}
			echo "新的结果集<br/>";
		}*/
	}
?>