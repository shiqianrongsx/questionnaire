 <?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 3;
    $result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
	$r=mysql_fetch_array($result);
	$error=false;
    if(mysql_num_rows($result) != 0){
		$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
		if(!executeQuery($query))
		{
		$error = true;
		$_GLOBALS['message']="Can't drop database". mysql_error();
		goto end;
		}
	}
	 

    for($i=1; $i<=8; $i++)
	{
		$iname = 'three'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{
		$error = true;		
		$_GLOBALS['message']="Your previous answer is not updated.Please answer once again". mysql_error();
		break;
		}
	}
	closedb();
	if(!$error)
	{
		header('Location: form4.php');

	}
	end:
		unset($_REQUEST['submitform']);
		echo $_GLOBALS['message'];
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
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	table{width:780px;}
</style>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表3 嗜睡量表</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form3" onsubmit="return checkFull(8);">
					<!--page1-->
						<div class="m1 mbox">
							<p>说明：在下列情况下你打瞌睡（不仅仅是感到疲倦）的可能如何？这是指你最近几月的通常生活情况；假如你最近没有做过其中的某些事情，
							请试着填上它们可能会给你带来多大的影响。</p>
							<table cellpadding="0" cellspacing="0" class="setTable">
								<tr><td><strong>情况</strong></td><td><strong>从不打瞌睡</strong></td><td><strong>轻度可能打瞌睡</strong></td><td><strong>中度可能大瞌睡</strong></td><td><strong>很可能打瞌睡</strong></td></tr>
								<tr><td>坐着阅读书刊</td><td><input type="radio" name="three1" value="0"></td><td><input type="radio" name="three1" value="1"></td><td><input type="radio" name="three1" value="2"></td><td><input type="radio" name="three1" value="3"></td></tr>
								<tr><td>看电视</td><td><input type="radio" name="three2" value="0"></td><td><input type="radio" name="three2" value="1"></td><td><input type="radio" name="three2" value="2"></td><td><input type="radio" name="three2" value="3"></td></tr>
								<tr><td>在公共场所坐着不动（例如在剧场或开会）</td><td><input type="radio" name="three3" value="0"></td><td><input type="radio" name="three3" value="1"></td><td><input type="radio" name="three3" value="2"></td><td><input type="radio" name="three3" value="3"></td></tr>
								<tr><td>作为乘客在汽车中坐1小时，中间不休息</td><td><input type="radio" name="three4" value="0"></td><td><input type="radio" name="three4" value="1"></td><td><input type="radio" name="three4" value="2"></td><td><input type="radio" name="three4" value="3"></td></tr>
								<tr><td>在环境许可时，下午躺下休息</td><td><input type="radio" name="three5" value="0"></td><td><input type="radio" name="three5" value="1"></td><td><input type="radio" name="three5" value="2"></td><td><input type="radio" name="three5" value="3"></td></tr>
								<tr><td>坐下与人谈话</td><td><input type="radio" name="three6" value="0"></td><td><input type="radio" name="three6" value="1"></td><td><input type="radio" name="three6" value="2"></td><td><input type="radio" name="three6" value="3"></td></tr>
								<tr><td>午餐不喝酒，餐后安静地坐着</td><td><input type="radio" name="three7" value="0"></td><td><input type="radio" name="three7" value="1"></td><td><input type="radio" name="three7" value="2"></td><td><input type="radio" name="three7" value="3"></td></tr>
								<tr><td>遇堵车时停车数分钟</td><td><input type="radio" name="three8" value="0"></td><td><input type="radio" name="three8" value="1"></td><td><input type="radio" name="three8" value="2"></td><td><input type="radio" name="three8" value="3"></td></tr>
							</table>
							<input type="reset" value="重置" class="button2"/>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="submit" name= "submitform" value="提交" class="button2"/>
						</div>
					<!--page2-->
						<div class="m2 mbox">
						</div>
					</form>
				</div>
				<ul class="menu">

				</ul>
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