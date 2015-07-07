<?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 5;
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
	 

    for($i=1; $i<=36; $i++)
	{
		$iname = 'five'.$i;
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
		header('Location: form6.php');
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
<title>form5</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:310px;}
	font{color:red;}
	#notice1,#notice2,#notice3,#notice4{color:red;display:none;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表5 慕尼黑时间类型问卷调查</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form5" onSubmit="return checkFull(6);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：以下时间填写精确到分钟，并<font style="color:red">按24小时计时</font>。即晚上11：00要写成23:00，晚上12：00要写成0:00。
							<br/>在工作日：
							<br/>1. 我起床的时间是<input type="text" name="five1" class="textShort">点<input type="text" name="five2" class="textShort">分。
							<br/>2. 我需要<input type="text" name="five3" class="textShort">分钟能够醒来。
							<br/>3. 我通常醒来&nbsp&nbsp&nbsp&nbsp<input type="radio" name="five4" value="A">需要闹钟	<input type="radio" name="five4" value="B">不需要闹钟							
							<br/>4. 我完全清醒的时间是从<input type="text" name="five5" class="textShort">点<input type="text" name="five6" class="textShort">分开始。			
							<br/>5. 晚上，大约在<input type="text" name="five7" class="textShort" onMouseOver="document.getElementById('notice1').style.display='inline';" onmouseout="document.getElementById('notice1').style.display='none';">点<span id="notice1">（24小时制，即晚上11点要写成23点，晚上12点要写成0点。）</span>，我会觉得有些精神倦怠。
							<br/>6.	我晚上<input type="text" name="five8" class="textShort"  onMouseOver="document.getElementById('notice2').style.display='inline';" onmouseout="document.getElementById('notice2').style.display='none';">点<input type="text" name="five9" class="textShort">分 <span id="notice2">（24小时制，即晚上11点要写成23点，晚上12点要写成0点。）</span>上床睡觉。
							<br/>7.	晚上上床后需要用<input type="text" name="five10" class="textShort">小时<input type="text" name="five11" class="textShort">分钟睡着。
							<br/>8.	如果可能，我喜欢睡午觉。
							<br/>&nbsp&nbsp&nbsp <input type="radio" name="five12" value="A" onClick="alert('请填写午睡时间')">是，我会午睡<input type="text" name="five13" class="textShort" value="0" style="color:#fff" onFocus="if(value=='0'){value='';this.style.color='black';}" onBlur="if(value==''){value='0';this.style.color='#fff';}">分钟。	<input type="radio" name="five12" value="B">否，我午睡后觉得很不舒服
						</p>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<p>在休息日（根绝平时正常的休息日来填写，不包括有特殊活动，如聚会等）
							<br/>1.	我梦想能够睡到<input type="text" name="five14" class="textShort">点。
							<br/>2.	我通常<input type="text" name="five15" class="textShort">点<input type="text" name="five16" class="textShort">分醒来。
							<br/>3.	如果我在平常工作日闹钟叫醒的时间醒来，我会继续睡觉。
							<br/>&nbsp&nbsp&nbsp <input type="radio" name="five17" value="A">是	<input type="radio" name="five17" value="B">否							
							<br/>4.	如果我继续睡，我会再睡<input type="text" name="five18" class="textShort">分钟。					
							<br/>5.	再次醒来，我需要<input type="text" name="five19" class="textShort">分钟能够醒来。
							<br/>6.	从<input type="text" name="five20" class="textShort">点<input type="text" name="five21" class="textShort">分开始，我完全清醒。	
							<br/>7.	晚上，大约在<input type="text" name="five22" class="textShort" onMouseOver="document.getElementById('notice3').style.display='inline';" onmouseout="document.getElementById('notice3').style.display='none';">点<span id="notice3">（24小时制，即晚上11点要写成23点，晚上12点要写成0点。）</span>，我会觉得有些精神倦怠。
							<br/>8.	我晚上<input type="text" name="five23" class="textShort" onMouseOver="document.getElementById('notice4').style.display='inline';" onmouseout="document.getElementById('notice4').style.display='none';">点<input type="text" name="five24" class="textShort" >分<span id="notice4">（24小时制，即晚上11点要写成23点，晚上12点要写成0点。）</span>上床睡觉。
							<br/>9.	晚上上床后需要用<input type="text" name="five25" class="textShort" >小时<input type="text" name="five26" class="textShort">分钟睡着。
							<br/>10.如果可能，我喜欢睡午觉。
							<br/>&nbsp&nbsp&nbsp <input type="radio" name="five27" value="A" onClick="alert('请填写午睡时间')">是，我会午睡<input type="text" name="five28" class="textShort" value="0" style="color:#fff" onFocus="if(value=='0'){value='';this.style.color='black';}" onBlur="if(value==''){value='0';this.style.color='#fff';}">分钟。	<input type="radio" name="five27" value="B">否，我午睡后觉得很不舒服
						</p>
					</div>
			<!--page3-->
					<div class="m3 mbox">
						<p>1. 一旦上床后，我喜欢阅读<input type="text" name="five29" class="textShort">分钟。
						<br/>2. 不过，通常不超过<input type="text" name="five30" class="textShort">分钟，我就睡着了。
						<br/>3. 我喜欢睡觉的时候，房间完全黑暗。 &nbsp&nbsp&nbsp <input type="radio" name="five31" value="A">是	<input type="radio" name="five31" value="B">否
						<br/>4. 当清早的光线照进房间的时候，我会更容易醒来。&nbsp&nbsp&nbsp <input type="radio" name="five32" value="A">是	<input type="radio" name="five32" value="B">否
						<br/>5. 每天你会花多长的时间在户外（真正的户外，接受日光）
						<br/>&nbsp&nbsp&nbsp&nbsp在工作日：<input type="text" name="five33" class="textShort">小时<input type="text" name="five34" class="textShort">分钟          
							&nbsp&nbsp&nbsp&nbsp在休息日：<input type="text" name="five35" class="textShort">小时<input type="text" name="five36" class="textShort">分钟
						</p>
						<br/><br/><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name="submitform" value="提交" class="button2">
					</div>
			<!--page4-->
					<div class="m4 mbox">
					</div>
					</form>
				</div>
				<div class="page">
					<div>第</div>
					<ul class="menu">
						<li class="l1">1</li>
						<li class="l2">2</li>	
						<li class="l3">3</li>					
					</ul>
					<div>页</div>
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