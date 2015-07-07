<?php
	error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 10;
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
		$iname = 'ten'.$i;
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
		header('Location: form11.php');
	}
	end:
		unset($_REQUEST['submitform']);
		echo $_GLOBALS['message'];
}
 ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>form10</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:260px;}
	table{width:780px;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表10 生活质量调查表SF-36</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form10" onsubmit="return checkFull(36);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：下面的问题是询问您对自己健康状况的看法、您的感觉如何以及您进行日常活动的能力如何。如果您没有把握如何回答问题，尽量作一个最好的答案。</p>
						<p>1、总体来讲，您的健康状况是：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten1" value="A">非常好&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten1" value="B">很好&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten1" value="C">好&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten1" value="D">一般&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten1" value="E">E.差 
						<br/>2、跟1年以前比您觉得自己的健康状况是：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten2" value="A">比1年前好多了&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten2" value="B">比1年前好一些&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten2" value="C">跟1年前差不多<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten2" value="D">比1年前差一些&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten2" value="E">E.比1年前差多了
						<br/>3、以下这些问题都和日常活动有关。请您想一想，您的健康状况是否限制了这些活动？如果有限制，程度如何
						<br/>（1）重体力活动。如跑步举重、参加剧烈运动等： 
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten3" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten3" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten3" value="C">毫无限制
						<br/>（2）适度的活动。如移动一张桌子、扫地、打太极拳、做简单体操等：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten4" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten4" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten4" value="C">毫无限制						
						</p>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<p>（3）手提日用品。如买菜、购物等：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten5" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten5" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten5" value="C">毫无限制
						<br/>（4）上几层楼梯：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten6" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten6" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten6" value="C">毫无限制
						<br/>（5）上一层楼梯：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten7" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten7" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten7" value="C">毫无限制
						<br/>（6）弯腰、屈膝、下蹲： 
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten8" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten8" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten8" value="C">毫无限制
						<br/>（7）步行1500米以上的路程： 
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten9" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten9" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten9" value="C">毫无限制
						<br/>（8）步行1000米的路程：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten10" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten10" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten10" value="C">毫无限制											
						</p>											
					</div>
				<!--page3-->
					<div class="m3 mbox">
						<p>（9）步行100米的路程：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten11" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten11" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten11" value="C">毫无限制	
						<br/>（10）自己洗澡、穿衣：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten12" value="A">限制很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten12" value="B">有些限制&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten12" value="C">毫无限制
						<br/>4、在过去4个星期里，您的工作和日常活动有无因为身体健康的原因而出现以下这些问题？
						<br/>（1）减少了工作或其他活动时间：<input type="radio" name="ten13" value="A">是<input type="radio" name="ten13" value="B">否
						<br/>（2）本来想要做的事情只能完成一部分：<input type="radio" name="ten14" value="A">是<input type="radio" name="ten14" value="B">否
						<br/>（3）想要干的工作或活动种类受到限制：<input type="radio" name="ten15" value="A">是<input type="radio" name="ten15" value="B">否
						<br/>（4）完成工作或其他活动困难增多（比如需要额外的努力）：<input type="radio" name="ten16" value="A">是<input type="radio" name="ten16" value="B">否
						<br/>5、在过去4个星期里，您的工作和日常活动有无因为情绪的原因（如压抑或忧虑）而出现以下这些问题？
						<br/>（1）减少了工作或其他活动时间：<input type="radio" name="ten17" value="A">是<input type="radio" name="ten17" value="B">否
						<br/>（2）本来想要做的事情只能完成一部分：<input type="radio" name="ten18" value="A">是<input type="radio" name="ten18" value="B">否
						<br/>（3）干事情不如平时仔细：<input type="radio" name="ten19" value="A">是<input type="radio" name="ten19" value="B">否
						</p>
					</div>
				<!--page4-->
					<div class="m4 mbox">
						<p>6、在过去4个星期里，您的健康或情绪不好在多大程度上影响了您与家人、朋友、邻居或集体的正常社会交往？
						<br/>&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten20" value="A">完全没有影响&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten20" value="B">有一点影响 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten20" value="C">中等影响<br/>&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten20" value="D">影响很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten20" value="E">影响非常大
						<br/>7、在过去4个星期里，您有身体疼痛吗？
						<br/>&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten21" value="A">完全没有影响&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten21" value="B">有一点影响 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten21" value="C">中等影响<br/>&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten21" value="D">影响很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="ten21" value="E">影响非常大
						<br/> 8、在过去4个星期里，您的身体疼痛影响了您的工作和家务吗？
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten22" value="A">完全没有影响&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten22" value="B">有一点影响 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten22" value="C">中等影响<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten22" value="D">影响很大&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten22" value="E">影响非常大
						<br/>9、以下这些问题是关于过去1个月里您自己的感觉，对每一条问题所说的事情，您的情况是什么样的？ 
						</p>
					</div>
				<!--page5-->
					<div class="m5 mbox">
						<p>	（1）您觉得生活充实：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten23" value="F">没有这种感觉
						<br/>（2）您是一个敏感的人： 
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten24" value="F">没有这种感觉
						<br/>（3）您的情绪非常不好，什么事都不能使您高兴起来：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten25" value="F">没有这种感觉
						</p>
					</div>
				<!--page6-->
					<div class="m6 mbox">
						<p>	（4）您的心理很平静：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten26" value="F">没有这种感觉
						<br/>（5）您做事精力充沛：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten27" value="F">没有这种感觉						
						<br/>（6）您的情绪低落：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten28" value="F">没有这种感觉
						</p>					
					</div>
					<!--page7-->
					<div class="m7 mbox">
						<p>（7）您觉得筋疲力尽：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten29" value="F">没有这种感觉
						<br/>（8）您是个快乐的人：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten30" value="F">没有这种感觉
						<br/>（9）您感觉厌烦：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten31" value="F">没有这种感觉												
						</p>
					</div>
					<!--page8-->
					<div class="m8 mbox">
					<p>（10）不健康影响了您的社会活动（如走亲访友）:
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="A">所有的时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="B">大部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="C">比较多时间<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="D">一部分时间&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="E">小部分时间 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten32" value="F">没有这种感觉						
						<br/>10、请看下列每一条问题，哪一种答案最符合您的情况？ 
						<br/>（1）我好象比别人容易生病：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten33" value="A">绝对正确&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten33" value="B">大部分正确 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten33" value="C">不能肯定<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten33" value="D">大部分错误&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten33" value="E">绝对错误			
						<br/>（2）我跟周围人一样健康：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten34" value="A">绝对正确&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten34" value="B">大部分正确 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten34" value="C">不能肯定<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten34" value="D">大部分错误&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten34" value="E">绝对错误
					</p>	
					</div>
					<!--page9-->
					<div class="m9 mbox">
					</p>（3）我认为我的健康状况在变坏：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten35" value="A">绝对正确&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten35" value="B">大部分正确 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten35" value="C">不能肯定<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten35" value="D">大部分错误&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten35" value="E">绝对错误											
						<br/>（4）我的健康状况非常好：
						<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten36" value="A">绝对正确&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten36" value="B">大部分正确 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten36" value="C">不能肯定<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten36" value="D">大部分错误&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="ten36" value="E">绝对错误
						</p>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name="submitform" value="提交" class="button2">
					</div>
					<!--page10-->
					<div class="m10 mbox">
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
						<li class="l6">6</li>	
						<li class="l7">7</li>
						<li class="l8">8</li>
						<li class="l9">9</li>						
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