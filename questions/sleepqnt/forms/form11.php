<?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 11;
    $result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
	$r=mysql_fetch_array($result);
	$error=false;
    if(mysql_num_rows($result) != 0){
		$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
		if(!executeQuery($query))
		{
		$error = true;
		$_GLOBALS['message']=mysql_error();
		goto end;
		}
	}
	 

    for($i=1; $i<=13; $i++)
	{
		$iname = 'ele'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{
		$error = true;		
		$_GLOBALS['message']=mysql_error();
		break;
		}
	}
	closedb();
	if(!$error == true)
	{
		header('Location: ../finish.html');
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
<title>form11</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:310px;}
	.option{width:700px;font-size:20px;}
	.option1{line-height:200%;width:100%;text-align:left;}
	.option2{line-height:200%;width:600px;text-align:left;}
	.optionfour{width:700px;font-size:20px;}
	.option2{line-height:200%;width:300px;text-align:left;}
	.optionfour2{line-height:200%;text-align:left;}
	.optionfour2 div{margin-right:50px;}
	.optionFour{width:700px;font-size:20px;}
	.optionFour2{line-height:200%;text-align:left;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表11 睡眠类型问卷合成性量表</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form11" onsubmit="return checkFull(13);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：请检查并选择最符合您的实际情况的一项</p>
						<div class="optionfour">
							<div class="left option1">1. 根据你自己的感觉，如果你可以完全自由的安排你的一天，你会在什么时间起床？</div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele1" value="A">05:00–06:30</div><div  class="left"><input type="radio" name="ele1" value="B">06:30–07:45</div><div  class="left"><input type="radio" name="ele1" value="C">07:45–09:45</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele1" value="D">09:45–11:00</div><div  class="left"><input type="radio" name="ele1" value="E">11:00–12:00</div></div>
						</div>
						<div class="optionfour">
							<div class="left option1">2. 根据你自己的感觉，如果你可以完全自由的安排自己的晚上，你会在什么时间睡觉？</div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele2" value="A">20:00–21:00</div><div  class="left"><input type="radio" name="ele2" value="B">21:00–22:15</div><div  class="left"><input type="radio" name="ele2" value="C">22:15–00:30</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele2" value="D">00:30–01:45</div><div  class="left"><input type="radio" name="ele2" value="E">01:45–03:00</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">3. 一般情况下，你清晨起床是否容易？ </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele3" value="A">一点也不容易</div><div class="left"><input type="radio" name="ele3" value="B">不太容易</div><div class="left"><input type="radio" name="ele3" value="C">比较容易</div><div class="left"><input type="radio" name="ele3" value="D">非常容易</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">4. 早晨醒后的半个小时内，你觉得你有多清醒？</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele4" value="A">一点也不清醒</div><div class="left"><input type="radio" name="ele4" value="B">轻度清醒</div><div class="left"><input type="radio" name="ele4" value="C">比较清醒</div><div class="left"><input type="radio" name="ele4" value="D">非常清醒</div></div>
						</div>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<div class="optionFour">
							<div class="left option1">5. 早晨醒后半个小时内，你感觉有多疲劳？</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele5" value="A">非常疲劳</div><div class="left"><input type="radio" name="ele5" value="B">比较疲劳</div><div class="left"><input type="radio" name="ele5" value="C">比较清爽</div><div class="left"><input type="radio" name="ele5" value="D">非常清爽</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">6.假设你决定进行体育锻炼，朋友建议你一周做两次，一次一个小时，最好的锻炼的时间段是早晨07:00到08:00. 按照你自己的生活习惯, 这样的时间安排，你执行起来觉得如何?</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele6" value="A">很好执行</div><div class="left"><input type="radio" name="ele6" value="B">较好执行</div><div class="left"><input type="radio" name="ele6" value="C">难以执行</div><div class="left"><input type="radio" name="ele6" value="D">非常难以执行</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">7.晚上你什么时间感觉到疲劳，且需要睡觉? </div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele7" value="A">20:00–21:00</div><div  class="left"><input type="radio" name="ele7" value="B">21:00–22:15</div><div  class="left"><input type="radio" name="ele7" value="C">22:15–00:30</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="ele7" value="D">00:30–01:45</div><div  class="left"><input type="radio" name="ele7" value="E">01:45–03:00</div></div>
						</div>
						<div class="option">
							<div class="left option1">8. 若要求你在你状态最佳时进行难度很大，且持续两个小时的测试。如果完全由你自己安排你的时间，这个测试你将选择何时进行?  </div><br style="clear:left;"/>
							<div class="left option2"><div  class="left"><input type="radio" name="ele8" value="A">08:00–10:00 </div><div  class="left"><input type="radio" name="ele8" value="C">15:00–17:00</div></div>
							<div class="left option2"><div  class="left"><input type="radio" name="ele8" value="B">11:00–13:00</div><div  class="left"><input type="radio" name="ele8" value="D">19:00–21:00</div></div>
						</div>	
					</div>
			<!--page3-->
					<div class="m3 mbox">
						<div class="option">
							<div class="left option1">9.人可分为 “清晨” 型和 “夜晚” 型。 你认为你属于哪种类型?</div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele9" value="A">绝对的“清晨”型</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele9" value="B">“清晨”型多过“夜晚”型</div>
							<div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele9" value="C">“夜晚”型多过“清晨”型</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele9" value="D">绝对的“夜晚”型</div></div>
						</div>	
						<div class="optionfour">
							<div class="left option1">10. 如果你可以全完自由的安排你自己的时间，假设你全天的工作时间是8小时，你更愿意在什么时候起床？</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele10" value="A">6:30之前</div><div class="left"><input type="radio" name="ele10" value="B">6:30-7:30</div><div class="left"><input type="radio" name="ele10" value="C">7:30-8:30</div><div class="left"><input type="radio" name="ele10" value="D">8:30以后</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">11.如果你总是在6:00之前起床，你认为会如何？ </div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele11" value="A">非常难起床且感到非常不高兴</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele11" value="B">比较难起床且比较不高兴</div>
							<div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele11" value="C">有一点不高兴但是没有太大问题</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele11" value="D">很容易起床且没有不高兴</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">12.  经过一晚上睡眠后，早上醒来通常要经过多长时间才能恢复清醒？ </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="ele12" value="A">0—10 分钟</div><div class="left"><input type="radio" name="ele12" value="B">11—20 分钟</div><div class="left"><input type="radio" name="ele12" value="C">21—40 分钟</div><div class="left"><input type="radio" name="ele12" value="D">超过40分钟</div></div>
						</div>
					</div>
			<!--page4-->
					<div class="m4 mbox">
						<div class="option">
							<div class="left option1">13. 请说明你是哪种程度的“清晨”型或者“夜晚”型：</div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele13" value="A">明显的“清晨”型（即早上清醒晚上疲惫）</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele13" value="B">一定程度的“清晨”型</div>
							<div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele13" value="C">一定程度的“夜晚”型 </div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="ele13" value="D">明显的“夜晚”型（即早上疲惫晚上清醒） </div></div>
						</div>	
						<br style="clear:left;"/><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name= "submitform" value="提交" class="button2">
					</div>
			<!--page5-->
					<div class="m5 mbox">
					</div>
					</form>					
				</div>
				
				<div class="page">
					<div>第</div>
					<ul class="menu">
						<li class="l1">1</li>
						<li class="l2">2</li>	
						<li class="l3">3</li>
						<li class="l4">4</li>					
					</ul>
					<div>页</div>
				</div>

			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_content">
			<div class="footer_copy">Copyright ? 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>

</body>
</html>