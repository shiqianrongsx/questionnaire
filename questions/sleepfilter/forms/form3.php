 <?php

 
     error_reporting(0);
     session_start();
     require_once 'db.php';
	if(isset($_REQUEST['submitform']))
	{
		$error=false;
		$formid = 3;
		$result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
		$r=mysql_fetch_array($result);
		if(mysql_num_rows($result) != 0){
			$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
			if(!executeQuery($query))
			{
			$error = true;
			$_GLOBALS['message']=mysql_error();
			goto end;
			}
		}
    for($i=1; $i<=20; $i++)
	{
		$iname = 'three'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{
		$error = true;		
		$_GLOBALS['message']=mysql_error();
		break;
		}
	}
	closedb();
	if(!$error){
		header('Location: ..\finish.html');
	}
end:
		unset($_REQUEST['submitform']);
		echo '<font style="color:white;">'.$_GLOBALS['message'].'</font>';	
		
}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>form3</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<style type="text/css">
	.textShort{font-size:16px;font-weight:bold;}
</style>
<script type="text/javascript">
	function checkFull(){
		var count=document.getElementsByTagName("input").length;
		for(var i=0;i<count;i++){
			if(i%2==0){
				var obj1=document.getElementsByTagName("input")[i];
				var obj2=document.getElementsByTagName("input")[i+1];
				if((obj1.value=="")&&(obj2.value=="")){
					alert("当前表单不能有空项");
					return false;
				}
			}
		}
	}
</script>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表3 左右利手检测</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form3" onsubmit="return checkFull();">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：以下10项中，如您经常用一手者, 在对应手栏填两个“+” 号, 如果左手和右手使用频率近似相等，则在左、右手栏中各填一个“+” 号。（注意：一定要根据平时的实际情况填表。）</p>
						<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
							<tr><td width="350px"><strong>项目</strong></td><td><strong>左手</strong></td><td><strong>右手</strong></td></tr>
							<tr><td>用哪只手拿笔写字</td><td><input type="text" name="three1"class="textShort"></td><td><input type="text" name="three2"class="textShort"></td></tr>
							<tr><td>哪只手拿筷子</td><td><input type="text" name="three3" class="textShort"></td><td><input type="text" name="three4" class="textShort"></td></tr>
							<tr><td>用哪只手掷东西</td><td><input type="text" name="three5" class="textShort"></td><td><input type="text" name="three6" class="textShort"></td></tr>
							<tr><td>用哪只手持牙刷刷牙</td><td><input type="text" name="three7" class="textShort"></td><td><input type="text" name="three8" class="textShort"></td></tr>
							<tr><td>哪只手用剪刀</td><td><input type="text" name="three9" class="textShort"></td><td><input type="text" name="three10" class="textShort"></td></tr>
							<tr><td>划火柴时哪只手拿火柴梗</td><td><input type="text" name="three11" class="textShort"></td><td><input type="text" name="three12" class="textShort"></td></tr>
							<tr><td>用哪只手持线穿针</td><td><input type="text" name="three13" class="textShort"></td><td><input type="text" name="three14" class="textShort"></td></tr>
							<tr><td>钉钉子时哪只手拿榔头</td><td><input type="text" name="three15" class="textShort"></td><td><input type="text" name="three16" class="textShort"></td></tr>
							<tr><td>哪只手握球拍打球</td><td><input type="text" name="three17" class="textShort"></td><td><input type="text" name="three18" class="textShort"></td></tr>
							<tr><td>哪只手拿毛巾洗脸</td><td><input type="text" name="three19" class="textShort"></td><td><input type="text" name="three20" class="textShort"></td></tr>
						</table>
							<input type="reset" value="重置" class="button2">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="submit" name="submitform" value="提交" class="button2">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_content">
			<div class="footer_copy">Copyright © 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>
</body>
</html>