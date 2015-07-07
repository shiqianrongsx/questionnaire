<?php
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 9;
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
    for($i=1; $i<=20; $i++)
	{
		$iname = 'nine'.$i;
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
		header('Location: form10.php');

	}
	end:
		unset($_REQUEST['submitform']);
		echo $_GLOBALS['message'];
}
 ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="conninet-type" conninet="text/html" charset="utf-8"/>
<title>form9</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:340px;}
	table{width:780px;}
</style>
</head>
<body  onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表9 特质焦虑问卷</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form9" onsubmit="return checkFull(20);">
				<!--page1-->
					<div class="m1 mbox">
						<p>指导语：下面列出的是一些人们常常用来描述他们自己的陈述，请阅读每一个陈述，然后选择适当的选项来表示您经常的感觉。没有对或错的回答，不要对任何一个陈述花太多的时间去考虑，但所给的回答应该是您平常所感觉到的。</p>
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td><strong>情况</strong></td><td><strong>完全没有</strong></td><td><strong>有些</strong></td><td><strong>中等程度</strong></td><td><strong>非常明显</strong></td></tr>
							<tr><td>我感到愉快</td><td><input type="radio" name="nine1" value="0"></td><td><input type="radio" name="nine1" value="1"></td><td><input type="radio" name="nine1" value="2"></td><td><input type="radio" name="nine1" value="3"></td></tr>
							<tr><td>我感到神经过敏和不安</td><td><input type="radio" name="nine2" value="0"></td><td><input type="radio" name="nine2" value="1"></td><td><input type="radio" name="nine2" value="2"></td><td><input type="radio" name="nine2" value="3"></td></tr>
							<tr><td>我感到自我满足</td><td><input type="radio" name="nine3" value="0"></td><td><input type="radio" name="nine3" value="1"></td><td><input type="radio" name="nine3" value="2"></td><td><input type="radio" name="nine3" value="3"></td></tr>
							<tr><td>我希望能像别人那样高兴</td><td><input type="radio" name="nine4" value="0"></td><td><input type="radio" name="nine4" value="1"></td><td><input type="radio" name="nine4" value="2"></td><td><input type="radio" name="nine4" value="3"></td></tr>
							<tr><td>我感到我像衰竭一样</td><td><input type="radio" name="nine5" value="0"></td><td><input type="radio" name="nine5" value="1"></td><td><input type="radio" name="nine5" value="2"></td><td><input type="radio" name="nine5" value="3"></td></tr>
							<tr><td>我感到很宁静</td><td><input type="radio" name="nine6" value="0"></td><td><input type="radio" name="nine6" value="1"></td><td><input type="radio" name="nine6" value="2"></td><td><input type="radio" name="nine6" value="3"></td></tr>
							<tr><td>我是平静的、冷静的和泰然自若的</td><td><input type="radio" name="nine7" value="0"></td><td><input type="radio" name="nine7" value="1"></td><td><input type="radio" name="nine7" value="2"></td><td><input type="radio" name="nine7" value="3"></td></tr>
							<tr><td>我感到困难一一堆集起来，因此无法克服</td><td><input type="radio" name="nine8" value="0"></td><td><input type="radio" name="nine8" value="1"></td><td><input type="radio" name="nine8" value="2"></td><td><input type="radio" name="nine8" value="3"></td></tr>
						</table>						
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td style="width:400px;"><strong>情况</strong></td><td><strong>完全没有</strong></td><td><strong>有些</strong></td><td><strong>中度程度</strong></td><td><strong>非常明显</strong></td></tr>							
							<tr><td>我过分忧虑一些事，实际这些事无关紧要</td><td><input type="radio" name="nine9" value="0"></td><td><input type="radio" name="nine9" value="1"></td><td><input type="radio" name="nine9" value="2"></td><td><input type="radio" name="nine9" value="3"></td></tr>							
							<tr><td>我是高兴的</td><td><input type="radio" name="nine10" value="0"></td><td><input type="radio" name="nine10" value="1"></td><td><input type="radio" name="nine10" value="2"></td><td><input type="radio" name="nine10" value="3"></td></tr>
							<tr><td>我的思想处于混乱状态</td><td><input type="radio" name="nine11" value="0"></td><td><input type="radio" name="nine11" value="1"></td><td><input type="radio" name="nine11" value="2"></td><td><input type="radio" name="nine11" value="3"></td></tr>
							<tr><td>我缺乏自信心</td><td><input type="radio" name="nine12" value="0"></td><td><input type="radio" name="nine12" value="1"></td><td><input type="radio" name="nine12" value="2"></td><td><input type="radio" name="nine12" value="3"></td></tr>
							<tr><td>我感到安全</td><td><input type="radio" name="nine13" value="0"></td><td><input type="radio" name="nine13" value="1"></td><td><input type="radio" name="nine13" value="2"></td><td><input type="radio" name="nine13" value="3"></td></tr>
							<tr><td>我容易做出决断</td><td><input type="radio" name="nine14" value="0"></td><td><input type="radio" name="nine14" value="1"></td><td><input type="radio" name="nine14" value="2"></td><td><input type="radio" name="nine14" value="3"></td></tr>
							<tr><td>我感到不合适</td><td><input type="radio" name="nine15" value="0"></td><td><input type="radio" name="nine15" value="1"></td><td><input type="radio" name="nine15" value="2"></td><td><input type="radio" name="nine15" value="3"></td></tr>
							<tr><td>我是满足的</td><td><input type="radio" name="nine16" value="0"></td><td><input type="radio" name="nine16" value="1"></td><td><input type="radio" name="nine16" value="2"></td><td><input type="radio" name="nine16" value="3"></td></tr>
							<tr><td>一些不重要的思想总缠绕着我，并打扰我</td><td><input type="radio" name="nine17" value="0"></td><td><input type="radio" name="nine17" value="1"></td><td><input type="radio" name="nine17" value="2"></td><td><input type="radio" name="nine17" value="3"></td></tr>
							<tr><td>我产生的沮丧是如此强烈，以致我不能从思想中排除它们</td><td><input type="radio" name="nine18" value="0"></td><td><input type="radio" name="nine18" value="1"></td><td><input type="radio" name="nine18" value="2"></td><td><input type="radio" name="nine18" value="3"></td></tr>
							<tr><td>我是一个镇定的人</td><td><input type="radio" name="nine19" value="0"></td><td><input type="radio" name="nine19" value="1"></td><td><input type="radio" name="nine19" value="2"></td><td><input type="radio" name="nine19" value="3"></td></tr>
							<tr><td>当我考虑我目前的事情和利益时，我就陷入紧张状态</td><td><input type="radio" name="nine20" value="0"></td><td><input type="radio" name="nine20" value="1"></td><td><input type="radio" name="nine20" value="2"></td><td><input type="radio" name="nine20" value="3"></td></tr>							
						</table>	
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name="submitform" value="提交" class="button2">						
					</div>
					
				<!--page3-->
					<div class="m3 mbox">

					</div>
					</form>
				</div>
				<div class="page">
					<div>第</div>
					<ul class="menu">
						<li class="l1">1</li>
						<li class="l2">2</li>						
					</ul>
					<div>页</div>
				</div>

			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_conninet">
			<div class="footer_copy">Copyright © 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>
</body>
</html>