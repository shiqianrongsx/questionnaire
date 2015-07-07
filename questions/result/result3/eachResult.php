<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
<?php
	error_reporting(0);
	require_once("db.php");
//显示表一的信息
	echo '<font style="color:red;font-weight:bold;">基本信息：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
	$query="select formid from Basic".$_REQUEST['ID']." where formid=1;";
	$result=executeQuery($query);
	if(!$result) die(mysql_error()); 
	if(mysql_fetch_row($result)){
		//显示信息
		$question1=array('姓名','年龄（周岁）','性别','受教育程度','年级','民族','宿舍号','电话','身高（cm）','体重（kg）','Email','身份证号','出生地','大学前长居住地','睡眠时间是否规律','每日平均睡眠时间（小时）','每日平均睡眠时间（分钟）','是否有午休习惯','一周几次','一次多长时间','过去一年是否从事倒班工作','几次','过去三个月是否进行跨越1个时区以上的旅行','如有，请注明时间地点','有无睡眠相关疾病','如有，请说疾病名称和患病时间','平均每周饮酒','平均每周饮咖啡','您的月经周期是否规律','您的月经周期','平均每次月经持续时间','初潮年龄');
		for($i=1;$i<=32;$i++){
			$query="select * from Basic".$_REQUEST['ID']." where formid=1 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result) die(mysql_error());
			while($r=mysql_fetch_row($result)){
				if($r[3]=='') {$r[3]='此处没有填写';}
				echo '<font style="color:#0000FF">'.$question1[$i-1].'</font>：'.$r[3].'<br/>';
			}
		}
		//BMI指数计算
		echo '<font style="color:#0000FF;font-weight:bold;">BMI指数：</font>';
		$query="call BMI('Basic".$_REQUEST['ID']."',@output);";
		$result=executeQuery($query);
		if(!$result){die(mysql_error());}
		$r=mysql_fetch_row($result);
		echo $r[0];
		mysql_free_result($result);
	}
	closedb();
//显示表二的信息
	echo '<br/><br/><font style="color:red;font-weight:bold;">表二：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
	$query="select formid from PartThree".$_REQUEST['ID']." where formid=2;";
	$result=executeQuery($query);
	if(!$result) die(mysql_error()); 
	if(mysql_fetch_row($result)){
		//显示信息
		$question2=array('A(1)','A(2)','A(3)','A(4)','A(5)','A(6)','A(7)','A(8)','A(9)','A(10)','A(11)','A(12)','B(1)','B(2)','B(3)','B(4)','B(5)','B(6)','B(7)','B(8)','B(9)','B(10)','B(11)','B(12)','C(1)','C(2)','C(3)','C(4)','C(5)','C(6)','C(7)','C(8)','C(9)','C(10)','C(11)','C(12)','D(1)','D(2)','D(3)','D(4)','D(5)','D(6)','D(7)','D(8)','D(9)','D(10)','D(11)','D(12)','E(1)','E(2)','E(3)','E(4)','E(5)','E(6)','E(7)','E(8)','E(9)','E(10)','E(11)','E(12)');
		for($i=1;$i<=60;$i++){
			$query="select * from PartThree".$_REQUEST['ID']." where formid=2 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result) die(mysql_error());
			while($r=mysql_fetch_row($result)){
				if($r[3]=='') {$r[3]='此处没有填写';}
				echo '<font style="color:#0000FF">'.$question2[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
			}
		}
			
	}
	closedb();
?>
</body>
</html>