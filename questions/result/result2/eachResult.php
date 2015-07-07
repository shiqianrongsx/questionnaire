<!DOCTYPE html>
<html>
<head>
<!--meta http-equiv="content-type" content="text/html;charset=utf-8"-->
</head>
<body>
<?php
	error_reporting(0);
	require_once("db.php");
//定义函数eachResult(),此函数包括了显示基本信息
	function eachResult($iID){
	//显示表一的信息
		echo '<font style="color:red;font-weight:bold;">基本信息：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from Basic".$iID." where formid=1;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question1=array('姓名','年龄（周岁）','性别','受教育程度','年级','民族','宿舍号','电话','身高（cm）','体重（kg）','Email','身份证号','个人编号','出生地','大学前长居住地','睡眠时间是否规律','每日平均睡眠时间（小时）','每日平均睡眠时间（分钟）','是否有午休习惯','一周几次','一次多长时间','过去一年是否从事倒班工作','几次','过去三个月是否进行跨越1个时区以上的旅行','如有，请注明时间地点','有无睡眠相关疾病','如有，请说疾病名称和患病时间','平均每周饮酒','平均每周饮咖啡','您的月经周期是否规律','您的月经周期','平均每次月经持续时间','初潮年龄');
			for($i=1;$i<=33;$i++){
				$query="select * from Basic".$iID." where formid=1 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question1[$i-1].'</font>：'.$r[3].'<br/>';
				}
			}
			//BMI指数计算
			echo '<font style="color:#0000FF;font-weight:bold;">BMI指数：</font>';
			$query="call BMI('Basic".$iID."',@output);";
			$result=executeQuery($query);
			if(!$result){die(mysql_error());}
			$r=mysql_fetch_row($result);
			echo $r[0];
			mysql_free_result($result);
		}
		closedb();
	//显示表二的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表二：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=2;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question2=array('1.','2.','3.','4.','5(1).','5(2).','5(3).','5(4).','5(5).','5(6).','5(7).','5(8).','5(9).','5(10).','5(10)','6.','7','8','9','10','10(1).','10(2).','10(3).','10(4).','10(5).','10(5)');
			for($i=1;$i<=26;$i++){
				$query="select * from PartTwo".$iID." where formid=2 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question2[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示表二计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score2('PartTwo".$iID."',@A,@B,@c,@D,@E,@F,@G,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">睡眠质量(A):</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">入睡时间(B):</font>'.$r[1].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">睡眠时间(C):</font>'.$r[2].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">睡眠效率(D):</font>'.$r[3].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">睡眠障碍(E):</font>'.$r[4].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">催眠药物(F):</font>'.$r[5].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">日间功能障碍(G):</font>'.$r[6].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">PSQI总分:</font>'.$r[7].'<br/><br/>';
			}
			mysql_free_result($result);
				
		}
		closedb();
	//显示表三的信息
		echo '<font style="color:red;font-weight:bold;">表三：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=3;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question3=array('1.','2.','3.','4.','5.','6.','7.','8');
			for($i=1;$i<=8;$i++){
				$query="select * from PartTwo".$iID." where formid=3 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question3[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示表三计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',3,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if(($r[0]>6)&&($r[0]<12))
				{
					echo '瞌睡';
				}elseif(($r[0]>11)&&($r[0]<17)){
					echo '过度瞌睡';
				}elseif($r[0]>16){
					echo '有危险性的瞌睡';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表四的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表四：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=4;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question4=array('1.','2.','3.','4.','5.','6.','7.','8','9','10','11','12','13','14','15','16','17','18','19');
			for($i=1;$i<=19;$i++){
				$query="select * from PartTwo".$iID." where formid=4 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question4[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',4,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if(($r[0]>15)&&($r[0]<43))
				{
					echo '绝对夜晚型';
				}elseif(($r[0]>42)&&($r[0]<50)){
					echo '中度夜晚型';
				}elseif(($r[0]>49)&&($r[0]<63)){
					echo '中间型';
				}elseif(($r[0]>62)&&($r[0]<70)){
					echo '中度清晨型';
				}elseif(($r[0]>69)&&($r[0]<87)){
					echo '绝对清晨型';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表五的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表五：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=5;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question5=array('1(1).','1(2).','2.','3.','4(1).','4(2).','5.','6(1).','6(2).','7(1).','7(2).','8(1).','8(2).','1.','2(1).','2(2).','3.','4.','5.','6(1).','6(2).','7.','8(1).','8(2).','9(1).','9(2).','10(1)','10(2)','1.','2.','3.','4.','5(1).','5(2).','5(3).','5(4).');
			for($i=1;$i<=36;$i++){
				$query="select * from PartTwo".$iID." where formid=5 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question5[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
					if($i==4){$n=$r[3];}
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score5('PartTwo".$iID."',@A,@B,@C,@D,@E,@F,@G,@H,@I,@J,@k,@l,@m);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">工作日睡觉时间:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">工作日睡醒时间:</font>'.$r[1].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">工作日完全清醒时间:</font>'.$r[2].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">工作日中间时间:</font>'.$r[3].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">工作日持续时间:</font>'.$r[4].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">休息日睡觉时间:</font>'.$r[5].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">休息日睡醒时间:</font>'.$r[6].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">休息日完全清醒时间:</font>'.$r[7].'&nbsp&nbsp&nbsp&nbsp&nbsp<br/><font style="color:#0000FF"> 休息日中间时间:</font>'.$r[8].'&nbsp&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">休息日持续时间:</font>'.$r[9].'&nbsp&nbsp&nbsp&nbsp<font style="color:#0000FF">户外时间:</font>'.$r[12].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
				echo '<font style="color:#0000FF">类型：</font>';
				if($n=="A"){
					if($r[10]<121)
					{
						echo 'extreme early';
					}elseif(($r[10]>120)&&($r[10]<181)){
						echo 'moderate early';
					}elseif(($r[10]>180)&&($r[10]<241)){
						echo 'slight early';
					}elseif(($r[10]>240)&&($r[10]<301)){
						echo 'normal';
					}elseif(($r[10]>300)&&($r[10]<361)){
						echo 'slight late';
					}elseif(($r[10]>360)&&($r[10]<421)){
						echo 'moderate late';
					}elseif($r[10]>420){
						echo 'extreme late';
					}
				}elseif($n=="B"){
					if($r[10]<121)
					{
						echo 'extreme early';
					}elseif(($r[10]>120)&&($r[10]<181)){
						echo 'moderate early';
					}elseif(($r[10]>180)&&($r[10]<241)){
						echo 'slight early';
					}elseif(($r[10]>240)&&($r[10]<301)){
						echo 'normal';
					}elseif(($r[10]>300)&&($r[10]<361)){
						echo 'slight late';
					}elseif(($r[10]>360)&&($r[10]<421)){
						echo 'moderate late';
					}elseif($r[10]>420){
						echo 'extreme late';
					}
					echo "（休息日）";
					if($r[11]<121)
					{
						echo 'extreme early';
					}elseif(($r[11]>120)&&($r[11]<181)){
						echo 'moderate early';
					}elseif(($r[11]>180)&&($r[11]<241)){
						echo 'slight early';
					}elseif(($r[11]>240)&&($r[11]<301)){
						echo 'normal';
					}elseif(($r[11]>300)&&($r[11]<361)){
						echo 'slight late';
					}elseif(($r[11]>360)&&($r[11]<421)){
						echo 'moderate late';
					}elseif($r[11]>420){
						echo 'extreme late';
					}
					echo "（工作日）";
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表六的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表六：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=6;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question6=array('1(1).','1(2).','1(3).','2.','3.','4.','5.');
			for($i=1;$i<=7;$i++){
				$query="select * from PartTwo".$iID." where formid=6 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question6[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',6,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if($r[0]<8)
				{
					echo '没有临床上显著的失眠症';
				}elseif(($r[0]>7)&&($r[0]<15)){
					echo '阈下失眠症';
				}elseif(($r[0]>14)&&($r[0]<22)){
					echo '临床失眠症（中重度）';
				}elseif(($r[0]>62)&&($r[0]<70)){
					echo '中度清晨型';
				}elseif(($r[0]>21)&&($r[0]<29)){
					echo '临床失眠症（重度）';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表七的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表七：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=7;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question7=array('1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','14.','15.','16.','17.','18.','19.','20.','21.');
			for($i=1;$i<=21;$i++){
				$query="select * from PartTwo".$iID." where formid=7 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question7[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',7,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if($r[0]<5)
				{
					echo '无抑郁';
				}elseif(($r[0]>4)&&($r[0]<8)){
					echo '轻度抑郁';
				}elseif(($r[0]>7)&&($r[0]<16)){
					echo '中度抑郁';
				}elseif($r[0]>15){
					echo '重度抑郁';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表八的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表八：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=8;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question8=array('1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','14.','15.','16.','17.','18.','19.','20.','21.');
			for($i=1;$i<=21;$i++){
				$query="select * from PartTwo".$iID." where formid=8 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question8[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',8,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.round(1.19*$r[0]).'&nbsp&nbsp&nbsp';
				if($r[0]>44)
				{
					echo '焦虑阳性';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表九的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表九：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=9;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question9=array('1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','14.','15.','16.','17.','18.','19.','20.');
			for($i=1;$i<=20;$i++){
				$query="select * from PartTwo".$iID." where formid=9 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question9[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$iID."',9,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if($r[0]<8)
				{
					echo '没有临床上显著的失眠症';
				}elseif(($r[0]>7)&&($r[0]<15)){
					echo '阈下失眠症';
				}elseif(($r[0]>14)&&($r[0]<22)){
					echo '临床失眠症（中重度）';
				}elseif(($r[0]>62)&&($r[0]<70)){
					echo '中度清晨型';
				}elseif(($r[0]>21)&&($r[0]<29)){
					echo '临床失眠症（重度）';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表十的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表十：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=10;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question10=array('1.','2.','3(1).','3(2).','3(3).','3(4).','3(5).','3(6).','3(7).','3(8).','3(9).','3(10).','4(1).','4(2).','4(3).','4(4).','5(1).','5(2).','5(3).','6.','7.','8.','9(1).','9(2).','9(3).','9(4).','9(5).','9(6).','9(7).','9(8).','9(9).','9(10).','10(1).','10(2).','10(3).','10(4).');
			for($i=1;$i<=36;$i++){
				$query="select * from PartTwo".$iID." where formid=10 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question10[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score10PF('PartTwo".$iID."',@PF);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">PF:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10RP('PartTwo".$iID."',@RP);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">RP:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10BP('PartTwo".$iID."',@BP);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">BP:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10GH('PartTwo".$iID."',@GH);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">GH:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10VT('PartTwo".$iID."',@VT);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">VT:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10SF('PartTwo".$iID."',@SF);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SF:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10RE('PartTwo".$iID."',@RE);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">RE:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			closedb();
			$query="call score10MH('PartTwo".$iID."',@MH);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">MH:</font>'.$r[0].'&nbsp&nbsp&nbsp&nbsp&nbsp';
			}
			mysql_free_result($result);
		}
		closedb();
	//显示表十一的信息
		echo '<br/><br/><font style="color:red;font-weight:bold;">表十一：</font><br/>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>';
		$query="select formid from PartTwo".$iID." where formid=11;";
		$result=executeQuery($query);
		if(!$result) die(mysql_error()); 
		if(mysql_fetch_row($result)){
			//显示信息
			$question11=array('1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.');
			for($i=1;$i<=13;$i++){
				$query="select * from PartTwo".$iID." where formid=11 and questionid=".$i.";";
				$result=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r=mysql_fetch_row($result)){
					if($r[3]=='') {$r[3]='此处没有填写';}
					echo '<font style="color:#0000FF">'.$question11[$i-1].'</font>&nbsp'.$r[3].'&nbsp&nbsp';
				}
			}
			//显示计算结果
			echo '<br/><br/><font style="color:#0000FF;font-weight:bold;">结论：</font><br/><br/>';
			$query="call score('PartTwo".$_REQUEST[ID]."',11,@score);";
			$result=executeQuery($query);
			if(!$result) die(mysql_error()); 
			while($r=mysql_fetch_row($result)){
				echo '<font style="color:#0000FF">SCORE:</font>'.$r[0].'&nbsp&nbsp&nbsp';
				if($r[0]<23)
				{
					echo '“夜晚”型';
				}elseif(($r[0]>7)&&($r[0]<15)){
					echo '阈下失眠症';
				}elseif(($r[0]>23)&&($r[0]<43)){
					echo '中间型';
				}elseif($r[0]>43){
					echo '“清晨”型';
				}
			}
			mysql_free_result($result);
		}
		closedb();
	}
//调用函数eachResult();
	eachResult($_REQUEST['ID']);
?>
</body>
</html>