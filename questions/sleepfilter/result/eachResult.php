<?php
	error_reporting(0);
	require_once("db.php");
//显示第一个表的信息
	echo '<font style="color:red;font-weight:bold;">表一：</font><br/>------------------------------------------------------------------<br/>';
	$query="select formid from ".$_REQUEST['ID']." where formid=1;";
	$result=executeQuery($query);
	if(!$result) die(mysql_error()); 
	if(mysql_fetch_row($result)){
		$question1=array('姓名','性别','年龄（周岁）','民族','体重（kg）','身高（cm）','Email','电话','身份证号','镶过金属牙或体内有金属异物','若是请详细说明');
		for($i=1;$i<=11;$i++){
			$query="select * from ".$_REQUEST[ID]." where formid=1 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			while($r=mysql_fetch_row($result)){
				if($r[3]==''){ $r[3]='此处没有填写';}
				echo '<font style="color:#0000FF">'.$question1[$i-1].'</font>：'.$r[3].'<br/><br/>';
			}		
		}
	}
//显示第二个表的信息
	echo '<font style="color:red;font-weight:bold;">表二：</font><br/>------------------------------------------------------------------<br/>';
	$query="select formid from ".$_REQUEST['ID']." where formid=2;";
	$result=executeQuery($query);
	if(!$result) die(mysql_error()); 
	if(mysql_fetch_row($result)){
		$question2=array('吸烟','平均每周饮酒','平均每周饮咖啡','外科病史','如有，请注明何种疾病和患病时间','心脏病','如有，请注明何种疾病和患病时间','肺病','如有，请注明何种疾病和患病时间','胃病','如有，请注明何种疾病和患病时间','一级亲属精神类疾病史（抑郁症；精神分裂；偏执性精神病等）','如有，请注明何种疾病和患病时间','一级亲属神经类疾病史（癫痫；痴呆；中风；脑梗塞；脑肿瘤；重症肌无力等）','如有，请注明何种疾病和患病时间','当前是否服用催眠药、激素、抗抑郁或其它药物','如有，请注明药品名称','是否长期服用催眠药、激素、抗抑郁或其它药物','如有，请注明药品名称：','有无临床诊断的睡眠障碍，请说明','如有，请注明药品名称','您的月经周期是否规律');
		for($i=1;$i<=22;$i++){
			$query="select * from ".$_REQUEST[ID]." where formid=2 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			while($r=mysql_fetch_row($result)){
				if($r[3]==''){ $r[3]='此处没有填写';}
				echo '<font style="color:#0000FF">'.$question2[$i-1].'</font>：'.$r[3].'<br/><br/>';
			}		
		}
	}
//显示第三个表的信息
	echo '<font style="color:red;font-weight:bold;">表三：</font><br/>------------------------------------------------------------------<br/>';
	$query="select formid from ".$_REQUEST['ID']." where formid=3;";
	$result=executeQuery($query);
	if(!$result) die(mysql_error()); 
	if(mysql_fetch_row($result)){
		$question3=array('用哪只手拿笔写字<br/>左手','右手','哪只手拿筷子<br/>左手','右手','用哪只手掷东西<br/>左手','右手','用哪只手持牙刷刷牙<br/>左手','右手','哪只手用剪刀<br/>左手','右手','划火柴时哪只手拿火柴梗<br/>左手','右手','用哪只手持线穿针<br/>左手','右手','钉钉子时哪只手拿榔头<br/>左手','右手','哪只手握球拍打球<br/>左手','右手','哪只手拿毛巾洗脸<br/>左手','右手');
		for($i=1;$i<=20;$i++){
			$query="select * from ".$_REQUEST[ID]." where formid=3 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			while($r=mysql_fetch_row($result)){
				if($r[3]==''){$r[3]='此处没有填写';}
				if($i%2==0){
					echo '<font style="color:#0000FF">'.$question3[$i-1].'</font>：'.$r[3].'<br/><br/>';
				}else{
					echo '<font style="color:#0000FF">'.$question3[$i-1].'</font>：'.$r[3].'&nbsp&nbsp&nbsp&nbsp';
				}
			}	
		}
	}
//显示出第三个表的判断结果（左右利手）
	echo '------------------------------------------------------------------<br/><font style="color:red;">结果是：</font>';
	//判断1-12答案中的偶数项
	$query="select formid from ".$_REQUEST['ID']." where formid=3;";
	$result=executeQuery($query);
	if(mysql_fetch_row($result)){
		for($i=1;$i<=12;$i++){
			$query="select * from ".$_REQUEST['ID']." where formid=3 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			if($i%2==0){
				while($r=mysql_fetch_row($result)){
					$j=$i/2;
					$arr[$j]=$r[3];
				}
			}
		}
		for($j=1;$j<=6;$j++){
			if($arr[$j]!='++'){
				die('该人为左利手');
			}
		}
		//判断13-20答案中的奇数项
		for($i=13;$i<=20;$i++){
			$query="select * from ".$_REQUEST['ID']." where formid=3 and questionid=".$i.";";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			if(($i%2)!=0){
				while($r=mysql_fetch_row($result)){
					$j=($i-1)/2-5;
					$arr[$j]=$r[3];
				}
			}
		}
		for($j=1;$j<=4;$j++){
			if($arr[$j]=='++'){
				die('该人为左利手');
			}
		}
		echo '该人为右利手';
	}else{
		echo '没有结果';
	}
	closedb();
?>