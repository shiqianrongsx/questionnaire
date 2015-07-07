 <?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 2;
    $result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
	$r=mysql_fetch_array($result);
	$error = false;
    if(mysql_num_rows($result) != 0){
		$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
		if(!executeQuery($query))
		{
		$error = true;
		$_GLOBALS['message']="Can't drop database". mysql_error();
		goto end;
		}
	}
	 

    for($i=1; $i<=26; $i++)
	{
		$iname = 'two'.$i;
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
		header('Location: form3.php');
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
<title>form2</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:290px;}
	.option{height:122px;width:700px;font-size:20px;}
	.option1{line-height:200%;width:100%;text-align:left;}
	.option2{line-height:200%;width:300px;text-align:left;}
	font{color:red;}
	#notice1,#notice2,#notice3{color:red;display:none;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表2 匹茨堡睡眠质量指数量表</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form2" onsubmit="return checkFull(20);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：以下的问题仅与您过去一个月的睡眠习惯有关。您应该对过去一个月中多数白天和晚上的睡眠情况作精确的回答，要回答所有的问题，<font>按24小时计时。如23:30，不要写成11:30pm，0:30，不能写成12:30</font>。
							<br/>1. 过去一个月您通常上床睡觉的时间是<input type="text" name="two1" class="textShort1" onMouseOver="document.getElementById('notice1').style.display='inline';" onmouseout="document.getElementById('notice1').style.display='none';">。<font id="notice1">（请按照题目要求填写）</font>
							<br/>2. 过去一个月您每晚通常要<input type="text" name="two2" class="textShort">分钟才能入睡。
							<br/>3. 过去一个月每天早上通常起床起床时间是<input type="text" name="two3" class="textShort1" onMouseOver="document.getElementById('notice2').style.display='inline';" onmouseout="document.getElementById('notice2').style.display='none';">。<font id="notice2">（请按照题目要求填写）</font>
							<br/>4. 过去一个月您每晚实际睡眠的时间是<input type="text" name="two4" class="textShort" onMouseOver="document.getElementById('notice3').style.display='inline';" onmouseout="document.getElementById('notice3').style.display='none';">小时。<font id="notice3">（不等于卧床时间）</font>
							<br/>◆从以下每一个问题中选一个最符合您的情况作答
							<br/>5. 过去一个月您是否因为以下问题而经常睡眠不好：
							<div class="option">
							<div class="option1">（1）不能在30分钟内入睡：</div>
							<div class="left option2"><div><input type="radio" name="two5" value="A">过去一个月没有</div><div><input type="radio" name="two5" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two5" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two5" value="D">每周平均三个或更多晚上</div></div>
							</div>	
							<div class="option">
							<div class="option1">（2）在晚上睡眠中醒来或早醒：</div>
							<div class="left option2"><div><input type="radio" name="two6" value="A">过去一个月没有</div><div><input type="radio" name="two6" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two6" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two6" value="D">每周平均三个或更多晚上</div></div>
							</div>			
						</p>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<div class="option">
							<div class="option1">（3）晚上有无起床上洗手间：</div>
							<div class="left option2"><div><input type="radio" name="two7" value="A">过去一个月没有</div><div><input type="radio" name="two7" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two7" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two7" value="D">每周平均三个或更多晚上</div></div>
						</div>	
						<div class="option">
							<div class="option1">（4）不舒服的呼吸：</div>
							<div class="left option2"><div><input type="radio" name="two8" value="A">过去一个月没有</div><div><input type="radio" name="two8" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two8" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two8" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="option1">（5）大声咳嗽或打鼾声：</div>
							<div class="left option2"><div><input type="radio" name="two9" value="A">过去一个月没有</div><div><input type="radio" name="two9" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two9" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two9" value="D">每周平均三个或更多晚上</div></div>
						</div>	
						<div class="option">
							<div class="option1">（6）感到寒冷：</div>
							<div class="left option2"><div><input type="radio" name="two10" value="A">过去一个月没有</div><div><input type="radio" name="two10" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two10" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two10" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="option1">（7）感到太热：</div>
							<div class="left option2"><div><input type="radio" name="two11" value="A">过去一个月没有</div><div><input type="radio" name="two11" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two11" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two11" value="D">每周平均三个或更多晚上</div></div>
						</div>
					</div>
			<!--page3-->
					<div class="m3 mbox">
						<div class="option">
							<div class="option1">（8）做不好的梦：</div>
							<div class="left option2"><div><input type="radio" name="two12" value="A">过去一个月没有</div><div><input type="radio" name="two12" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two12" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two12" value="D">每周平均三个或更多晚上</div></div>
						</div>	
						<div class="option">
							<div class="option1">（9）出现疼痛：</div>
							<div class="left option2"><div><input type="radio" name="two13" value="A">过去一个月没有</div><div><input type="radio" name="two13" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two13" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two13" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="option1">（10）其他原因：</div>	
							<div class="left option2"><div><input type="radio" name="two14" value="A">过去一个月没有</div><div><input type="radio" name="two14" value="C" onclick="alert('若有其他原因，请描述')">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two14" value="B" onclick="alert('若有其他原因，请描述')">每周平均不足一个晚上</div><div><input type="radio" name="two14" value="D" onclick="alert('若有其他原因，请描述')">每周平均三个或更多晚上</div></div>														
						</div>
						<div class="option1" style="padding-left:20px;font-size:20px;">若有其他原因，请描述：<input type="text" name="two15" class="textLong" value="无"  style="color:#C6C6C1" onfocus="if(value=='无'){value='';this.style.color='black';}" onblur="if(value==''){value='无';this.style.color='#C6C6C1';}"></div>
						<div class="option">
							<div class="option1">6. 您对过去一个月总睡眠质量评分：</div>
							<div class="left option2"><div><input type="radio" name="two16" value="A">非常好</div><div><input type="radio" name="two16" value="C">不好</div></div>
							<div class="left option2"><div><input type="radio" name="two16" value="B">尚好</div><div><input type="radio" name="two16" value="D">非常差</div></div>
						</div>
					</div>
			<!--page4-->
					<div class="m4 mbox">
						<div class="option">
							<div class="option1">7. 过去一个月，您是否经常要服药（包括从以医生处方或者在外面药店购买）才能入睡？</div>
							<div class="left option2"><div><input type="radio" name="two17" value="A">过去一个月没有</div><div><input type="radio" name="two17" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two17" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two17" value="D">每周平均三个或更多晚上</div></div>
						</div><br style="left;">
						<div class="option">
							<div class="left option1">8. 过去一个月您在开车、吃饭或参加社会活动时难以保持清醒状态？</div><br style="clear:left;">
							<div class="left option2"><div><input type="radio" name="two18" value="A">过去一个月没有</div><div><input type="radio" name="two18" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two18" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two18" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="left option1">9. 过去一个月，您在积极完成事情上是否有困难？</div><br style="clear:left;">
							<div class="left option2"><div><input type="radio" name="two19" value="A">没有困难</div><div><input type="radio" name="two19" value="C">比较困难</div></div>
							<div class="left option2"><div><input type="radio" name="two19" value="B">有一点困难</div><div><input type="radio" name="two19" value="D">非常困难</div></div>
						</div>
						<div class="option">
							<div class="left option1">10.您是与人同睡一床（睡觉同伴，包括配偶）或有室友？</div>
							<div class="left option2"><div><input type="radio" name="two20" value="A">没有与人同睡一床或有室友</div><div><input type="radio" name="two20" value="C">同伴在同一房间但不睡同床</div></div>
							<div class="left option2"><div><input type="radio" name="two20" value="B">同伴或室友在另外房间</div><div><input type="radio" name="two20" value="D">同伴在同一床上</div></div>
						</div>
					</div>
			<!--page5-->
					<div class="m5 mbox">
						<p>◆如果您是与人同睡一床或有室友，请询问他（她）您过去一个月是否出现以下情况:</p>
						<div class="option">
							<div class="option1">（1）您在睡觉时，有无打鼾声：</div>
							<div class="left option2"><div><input type="radio" name="two21" value="A">过去一个月没有</div><div><input type="radio" name="two21" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two21" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two21" value="D">每周平均三个或更多晚上</div></div>
						</div>					
						<div class="option">
							<div class="option1">（2）在您睡觉时，呼吸之间有没有长时间停顿：</div>
							<div class="left option2"><div><input type="radio" name="two22" value="A">过去一个月没有</div><div><input type="radio" name="two22" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two22" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two22" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="option1">（3）在您睡觉时，您的腿是否有抽动或者有痉挛：</div>
							<div class="left option2"><div><input type="radio" name="two23" value="A">过去一个月没有</div><div><input type="radio" name="two23" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two23" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two23" value="D">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option">
							<div class="option1">（4）在您睡觉时是否出现不能辨认方向或混乱状态：</div>
							<div class="left option2"><div><input type="radio" name="two24" value="A">过去一个月没有</div><div><input type="radio" name="two24" value="C">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two24" value="B">每周平均不足一个晚上</div><div><input type="radio" name="two24" value="D">每周平均三个或更多晚上</div></div>
						</div>

						
				</div>
			<!--page6-->	
					<div class="m6 mbox">
						<div class="option">
							<div class="option1">（5）在您睡觉时是否有其他睡不安宁的情况：</div>
							<div class="left option2"><div><input type="radio" name="two25" value="A">过去一个月没有</div><div><input type="radio" name="two25" value="C" onclick="alert('若有，请描述')">每周平均一或两个晚上</div></div>
							<div class="left option2"><div><input type="radio" name="two25" value="B" onclick="alert('若有，请描述')">每周平均不足一个晚上</div><div><input type="radio" name="two25" value="D" onclick="alert('若有，请描述')">每周平均三个或更多晚上</div></div>
						</div>
						<div class="option1" style="padding-left:20px;font-size:20px;">若有，请描述：<input type="text" name="two26" class="textLong" value="无" style="color:#C6C6C1" onfocus="if(value=='无'){value='';this.style.color='black';}" onblur="if(value==''){value='无';this.style.color='#C6C6C1';}"></div>
						<br/><br/><br/>
						<input type="reset" value="重置" class="button2"/>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name= "submitform" value="提交" class="button2"/>
					</div>
			<!--page7-->				
					<div class="m7 mbox">
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