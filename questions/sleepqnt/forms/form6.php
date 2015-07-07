<?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 6;
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
	 

    for($i=1; $i<=7; $i++)
	{
		$iname = 'six'.$i;
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
		header('Location: form7.php');
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
<title>form6</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:330px;}
	table{width:800px;}
</style>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表6 失眠严重指数</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form6" onsubmit="return checkFull(7);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：对于以下问题，请您选出近1个月以来最符合您的睡眠情况的数字。</p>
						<p> 1. 描述你当前（或最近一周）失眠问题的严重程度。</p>
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td><strong>情况</strong></td><td><strong>无</strong></td><td><strong>轻度</strong></td><td><strong>中度</strong></td><td><strong>重度</strong></td><td><strong>极重度</strong></td></tr>
							<tr><td>入睡困难</td><td><input type="radio" name="six1" value="0"></td><td><input type="radio" name="six1" value="1"></td><td><input type="radio" name="six1" value="2"></td><td><input type="radio" name="six1" value="3"></td><td><input type="radio" name="six1" value="4"></td></tr>
							<tr><td>维持睡眠困难</td><td><input type="radio" name="six2" value="0"></td><td><input type="radio" name="six2" value="1"></td><td><input type="radio" name="six2" value="2"></td><td><input type="radio" name="six2" value="3"></td><td><input type="radio" name="six2" value="4"></td></tr>
							<tr><td>早醒</td><td><input type="radio" name="six3" value="0"></td><td><input type="radio" name="six3" value="1"></td><td><input type="radio" name="six3" value="2"></td><td><input type="radio" name="six3" value="3"></td><td><input type="radio" name="six3" value="4"></td></tr>
						</table>
						<p>2.</p>
						<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
							<tr><td><strong>情况</strong></td><td><strong>很满意</strong></td><td><strong>满意</strong></td><td><strong>一般</strong></td><td><strong>不满意</strong></td><td><strong>很不满意</strong></td></tr>
							<tr><td>对你当前睡眠模式的满意度</td><td><input type="radio" name="six4" value="0"></td><td><input type="radio" name="six4" value="1"></td><td><input type="radio" name="six4" value="2"></td><td><input type="radio" name="six4" value="3"></td><td><input type="radio" name="six4" value="4"></td></tr>
						</table>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<p>3.</p>
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td style="width:400px;"><strong>情况</strong></td><td><strong>没有干扰</strong></td><td><strong>轻微</strong></td><td><strong>有些</strong></td><td><strong>较多</strong></td><td><strong>很多干扰</strong></td></tr>
							<tr><td>你认为你的睡眠问题在多大程度上干扰了你的日间功能（如日间疲劳、处理工作和日常事务的能力、注意力、记忆力、情绪等）</td><td><input type="radio" name="six5" value="0"></td><td><input type="radio" name="six5" value="1"></td><td><input type="radio" name="six5" value="2"></td><td><input type="radio" name="six5" value="3"></td><td><input type="radio" name="six5" value="4"></td></tr>
						</table>
						<p>4.</p>
						<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
							<tr><td style="width:400px;"><strong>情况</strong></td><td><strong>没有</strong></td><td><strong>一点</strong></td><td><strong>有些</strong></td><td><strong>较多</strong></td><td><strong>很多</strong></td></tr>
							<tr><td>与其他人相比，你的失眠问题对你的生活质量有多大程度的影响或损害</td><td><input type="radio" name="six6" value="0"></td><td><input type="radio" name="six6" value="1"></td><td><input type="radio" name="six6" value="2"></td><td><input type="radio" name="six6" value="3"></td><td><input type="radio" name="six6" value="6"></td></tr>
						</table>
						<p>5.</p>
						<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
							<tr><td style="width:400px;"><strong>情况</strong></td><td><strong>没有</strong></td><td><strong>一点</strong></td><td><strong>有些</strong></td><td><strong>较多</strong></td><td><strong>很多</strong></td></tr>
							<tr><td>你对自己当前睡眠问题有多大程度的焦虑和烦扰</td><td><input type="radio" name="six7" value="0"></td><td><input type="radio" name="six7" value="1"></td><td><input type="radio" name="six7" value="2"></td><td><input type="radio" name="six7" value="3"></td><td><input type="radio" name="six7" value="4"></td></tr>
						</table>
						<br/>
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
		<div id="footer_content">
			<div class="footer_copy">Copyright © 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>
</body>
</html>