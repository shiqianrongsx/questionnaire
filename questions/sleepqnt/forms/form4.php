<?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 4;
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
	 

    for($i=1; $i<=19; $i++)
	{
		$iname = 'four'.$i;
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
		header('Location: form5.php');
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
<title>form4</title>
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
			<h1>表4 睡眠类型问卷</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form4" onsubmit="return checkFull(19);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：从以下每一个问题中选一个最符合您的情况。</p>
						<div class="optionfour">
							<div class="left option1">1. 根据你自己的感觉，如果完全由你自己安排你的一天，你将何时起床？</div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four1" value="A">05:00–06:30</div><div  class="left"><input type="radio" name="four1" value="B">06:30–07:45</div><div  class="left"><input type="radio" name="four1" value="C">07:45–09:45</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four1" value="D">09:45–11:00</div><div  class="left"><input type="radio" name="four1" value="E">11:00–12:00</div></div>
						</div>
						<div class="optionfour">
							<div class="left option1">2. 根据你自己的感觉，如果完全由你自己安排你的一天，你将何时睡觉？</div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four2" value="A">20:00–21:00</div><div  class="left"><input type="radio" name="four2" value="B">21:00–22:15</div><div  class="left"><input type="radio" name="four2" value="C">22:15–00:30</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four2" value="D">00:30–01:45</div><div  class="left"><input type="radio" name="four2" value="E">01:45–03:00</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">3. 如果第二天早上某特定时间要做某事，你在多大程度上需要依靠闹钟将你叫醒？ </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four3" value="A">根本不需要</div><div class="left"><input type="radio" name="four3" value="B">轻度依赖</div><div class="left"><input type="radio" name="four3" value="C">比较依赖</div><div class="left"><input type="radio" name="four3" value="D">非常依赖</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">4. 假如有适宜的环境条件，你清晨起床是否容易? </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four4" value="A">一点也不容易</div><div class="left"><input type="radio" name="four4" value="B">不太容易</div><div class="left"><input type="radio" name="four4" value="C">比较容易</div><div class="left"><input type="radio" name="four4" value="D">非常容易</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">5. 早晨醒后的半个小时内，你觉得你有多清醒？</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four5" value="A">一点也不清醒</div><div class="left"><input type="radio" name="four5" value="B">轻度清醒</div><div class="left"><input type="radio" name="four5" value="C">比较清醒</div><div class="left"><input type="radio" name="four5" value="D">非常清醒</div></div>
						</div>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<div class="optionFour">
							<div class="left option1">6.早晨清醒后半个小时内，你的食欲如何? </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four6" value="A">一点也不好</div><div class="left"><input type="radio" name="four6" value="B">比较差</div><div class="left"><input type="radio" name="four6" value="C">比较好</div><div class="left"><input type="radio" name="four6" value="D">非常好</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">7.早晨清醒后半个小时内，你感觉有多疲劳?</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four7" value="A">非常疲劳</div><div class="left"><input type="radio" name="four7" value="B">比较疲劳</div><div class="left"><input type="radio" name="four7" value="C">比较清爽</div><div class="left"><input type="radio" name="four7" value="D">非常清爽</div></div>
						</div>
						<div class="option">
							<div class="left option1">8. 如果第二天没有什么特殊事情，与平时相比，你会何时上床睡觉? </div><br style="clear:left;"/>
							<div class="left option2"><div><input type="radio" name="four8" value="A">很少或从不推迟 </div><div><input type="radio" name="four8" value="C">推迟1-2个小时</div></div>
							<div class="left option2"><div><input type="radio" name="four8" value="B">推迟不足一个小时</div><div><input type="radio" name="four8" value="D">推迟2个小时以上</div></div>
						</div>	
						<div class="optionFour">
							<div class="left option1">9. 假设你决定进行体育锻炼.朋友建议你一周做两次，一次一个小时，对于你的朋友来说最好的时间段是早晨07:00到08:00. 按照你自己的生活习惯, 这样的时间安排，你执行起来觉得如何?</div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four9" value="A">很好执行</div><div class="left"><input type="radio" name="four9" value="B">较好执行</div><div class="left"><input type="radio" name="four9" value="C">难以执行</div><div class="left"><input type="radio" name="four9" value="D">非常难以执行</div></div>
						</div>
						<div class="optionfour">
							<div class="left option1">10.晚上你什么时间感觉到疲劳，且需要睡觉?(具体时间) </div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four10" value="A">20:00–21:15</div><div  class="left"><input type="radio" name="four10" value="B">21:00–22:15</div><div  class="left"><input type="radio" name="four10" value="C">22:15–00:45</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four10" value="D">00:45–02:00</div><div  class="left"><input type="radio" name="four10" value="E">02:00–03:00</div></div>
						</div>
					</div>
			<!--page3-->
					<div class="m3 mbox">
						<div class="optionFour">
							<div class="left option1">11.你希望在你状态最佳时进行难度很大，且持续两个小时的测试。如果完全由你自己安排你的时间，这个测试你将何时进行? </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four11" value="A">08:00–10:00</div><div class="left"><input type="radio" name="four11" value="B">11:00–13:00</div><div class="left"><input type="radio" name="four11" value="C">15:00–17:00</div><div class="left"><input type="radio" name="four11" value="D">19:00–21:00</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">12. 如果你在晚上 11:00 上床睡觉，在这个时间你疲劳的程度是多少? </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four12" value="A">一点也不疲劳</div><div class="left"><input type="radio" name="four12" value="B">轻度疲劳</div><div class="left"><input type="radio" name="four12" value="C">比较疲劳</div><div class="left"><input type="radio" name="four12" value="D">非常疲劳</div></div>
						</div>
						<div class="option">
							<div class="left option1">13.因为某种原因你比平时推迟了几个小时上床睡觉，但是你没有必要在第二天任何特定时间起床。你将：</div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four13" value="A">和平常一样的时间起床，且不会再睡</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four13" value="B">和平常一样的时间起床，然后小睡</div>
												<div  style="text-align:left;margin-left:20px;"><input type="radio" name="four13" value="C">和平常一样的时间起床，然后再睡</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four13" value="D">比平常晚一些起床</div></div>
						</div>	

					</div>
			<!--page4-->
					<div class="m4 mbox">
						<div class="option">
							<div class="left option1">14. 某天夜里因为值夜班，你在凌晨04:00到06:00之间必须保持清醒，第二天你没有特殊的事情要做，下列情景你最有可能选择: </div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four14" value="A">直到凌晨06:00才去睡觉</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four14" value="B">04:00之前小睡，06:00以后再睡</div>
									<div  style="text-align:left;margin-left:20px;"><input type="radio" name="four14" value="C">04:00之前睡觉，06:00以后小睡</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four14" value="D">只在04:00之前睡觉</div></div>
						</div>	
						<div class="optionFour">
							<div class="left option1">15. 假如你必须做2小时的体力活动. 如果你能完全自由地计划白天的时间,且仅需考虑你自己的生活习惯, 你会选择下列哪个时间段: </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four15" value="A">08:00–10:00</div><div class="left"><input type="radio" name="four15" value="B">11:00–13:00</div><div class="left"><input type="radio" name="four15" value="C">15:00–17:00</div><div class="left"><input type="radio" name="four15" value="D">19:00–21:00</div></div>
						</div>
						<div class="optionFour">
							<div class="left option1">16. 你决定进行体育锻炼，一个朋友建议你在晚上10:00至11:00进行，一周两次. 如果仅需考虑你自己的生活习惯，这样的时间，你执行起来觉得:  </div><br style="clear:left;"/>
							<div class="left optionFour2"><div class="left"><input type="radio" name="four16" value="A">很好执行</div><div class="left"><input type="radio" name="four16" value="B">较好执行</div><div class="left"><input type="radio" name="four16" value="C">难以执行</div><div class="left"><input type="radio" name="four16" value="D">非常难以执行</div></div>
						</div>
					</div>
			<!--page5-->
					<div class="m5 mbox">
						<div class="optionfour">
							<div class="left option1">17. 假定你可以选择你的工作时间，但是一天必须工作5小时(包括中间的休息)。你将选择哪个连续的 5 小时：</div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four17" value="A">从04:00–08:00之间开始</div><div  class="left"><input type="radio" name="four17" value="B">从08:00–09:00之间开始</div><div  class="left"></div>
							<div class="left optionfour2"><input type="radio" name="four17" value="C">从09:00–14:00之间开始</div><div  class="left"><input type="radio" name="four17" value="D">从14:00–17:00之间开始</div><div  class="left"><input type="radio" name="four17" value="E">从17:00–04:00之间开始</div></div>
						</div>
						<div class="optionfour">
							<div class="left option1">18. 一天当中你觉得何时状态最佳?(请写具体时间) </div><br style="clear:left;"/>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four18" value="A">05:00–08:00</div><div  class="left"><input type="radio" name="four18" value="B">08:00–10:00</div><div  class="left"><input type="radio" name="four18" value="C">10:00–17:00</div></div>
							<div class="left optionfour2"><div  class="left"><input type="radio" name="four18" value="D">17:00–22:00</div><div  class="left"><input type="radio" name="four18" value="E">22:00–05:00</div></div>
						</div>
						<div class="option">
							<div class="left option1">19.人可分为 “清晨” 型和 “夜晚” 型。 你认为你属于哪种类型?</div><br style="clear:left;"/>
							<div class="left" style="line-height:200%"><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four19" value="A">绝对的“清晨”型</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four19" value="B">“清晨”型多过“夜晚”型</div>
									<div  style="text-align:left;margin-left:20px;"><input type="radio" name="four19" value="C">“夜晚”型多过“清晨”型</div><div  style="text-align:left;margin-left:20px;"><input type="radio" name="four19" value="D">绝对的“夜晚”型</div></div>
						</div>	
						<br style="clear:left;"/><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name= "submitform" value="提交" class="button2">
					</div>
			<!--page6-->								
					<div class="m6 mbox">
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
						<li class="l5">5</li>					
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