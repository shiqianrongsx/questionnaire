<?php
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 8;
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
	 

    for($i=1; $i<=21; $i++)
	{
		$iname = 'eig'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{
		$error = true;		
		$_GLOBALS['message']=mysql_error();
		break;
		}
	}
	closedb();
	if(!$error)
	{
		header('Location: form9.php');
	}
	end:
		unset($_REQUEST['submitform']);
		echo $_GLOBALS['message'];
}
 ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>form8</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:330px;}
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
			<h1>表8 贝克情绪自评量表2 </h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form8" onsubmit="return checkFull(21);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：本表共21项目，分为“完全没有困扰”、“轻度困扰 (对我没有多大困扰)”、“中度困扰(令我很不舒服，但还可以忍受)”、
						“重度困扰(我几乎不能忍受)”四种程度。请选出最近一个周（包括今天）来您曾经因为下面各项症状受困扰的程度。</p>
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td><strong>情况</strong></td><td><strong>完全没有困扰</strong></td><td><strong>轻度困扰</strong></td><td><strong>中度困扰</strong></td><td><strong>重度困扰</strong></td></tr>
							<tr><td>身体麻木或刺痛感</td><td><input type="radio" name="eig1" value="0"></td><td><input type="radio" name="eig1" value="1"></td><td><input type="radio" name="eig1" value="2"></td><td><input type="radio" name="eig1" value="3"></td></tr>
							<tr><td>身体发热</td><td><input type="radio" name="eig2" value="0"></td><td><input type="radio" name="eig2" value="1"></td><td><input type="radio" name="eig2" value="2"></td><td><input type="radio" name="eig2" value="3"></td></tr>
							<tr><td>双脚站不稳</td><td><input type="radio" name="eig3" value="0"></td><td><input type="radio" name="eig3" value="1"></td><td><input type="radio" name="eig3" value="2"></td><td><input type="radio" name="eig3" value="3"></td></tr>
							<tr><td>不能放松</td><td><input type="radio" name="eig4" value="0"></td><td><input type="radio" name="eig4" value="1"></td><td><input type="radio" name="eig4" value="2"></td><td><input type="radio" name="eig4" value="3"></td></tr>
							<tr><td>害怕最坏的事会发生</td><td><input type="radio" name="eig5" value="0"></td><td><input type="radio" name="eig5" value="1"></td><td><input type="radio" name="eig5" value="2"></td><td><input type="radio" name="eig5" value="3"></td></tr>
							<tr><td>头昏眼花或昏眩</td><td><input type="radio" name="eig6" value="0"></td><td><input type="radio" name="eig6" value="1"></td><td><input type="radio" name="eig6" value="2"></td><td><input type="radio" name="eig6" value="3"></td></tr>
							<tr><td>心悸或心率加快</td><td><input type="radio" name="eig7" value="0"></td><td><input type="radio" name="eig7" value="1"></td><td><input type="radio" name="eig7" value="2"></td><td><input type="radio" name="eig7" value="3"></td></tr>
							<tr><td>不安稳</td><td><input type="radio" name="eig8" value="0"></td><td><input type="radio" name="eig8" value="1"></td><td><input type="radio" name="eig8" value="2"></td><td><input type="radio" name="eig8" value="3"></td></tr>
							<tr><td>恐惧感</td><td><input type="radio" name="eig9" value="0"></td><td><input type="radio" name="eig9" value="1"></td><td><input type="radio" name="eig9" value="2"></td><td><input type="radio" name="eig9" value="3"></td></tr>														
						</table>						
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td><strong>情况</strong></td><td><strong>完全没有困扰</strong></td><td><strong>轻度困扰</strong></td><td><strong>中度困扰</strong></td><td><strong>重度困扰</strong></td></tr>
							<tr><td>紧张、神经质</td><td><input type="radio" name="eig10" value="0"></td><td><input type="radio" name="eig10" value="1"></td><td><input type="radio" name="eig10" value="2"></td><td><input type="radio" name="eig10" value="3"></td></tr>
							<tr><td>噎塞窒息的感觉</td><td><input type="radio" name="eig11" value="0"></td><td><input type="radio" name="eig11" value="1"></td><td><input type="radio" name="eig11" value="2"></td><td><input type="radio" name="eig11" value="3"></td></tr>
							<tr><td>手抖</td><td><input type="radio" name="eig12" value="0"></td><td><input type="radio" name="eig12" value="1"></td><td><input type="radio" name="eig12" value="2"></td><td><input type="radio" name="eig12" value="3"></td></tr>
							<tr><td>身体摇晃颤抖</td><td><input type="radio" name="eig13" value="0"></td><td><input type="radio" name="eig13" value="1"></td><td><input type="radio" name="eig13" value="2"></td><td><input type="radio" name="eig13" value="3"></td></tr>
							<tr><td>害怕失去控制</td><td><input type="radio" name="eig14" value="0"></td><td><input type="radio" name="eig14" value="1"></td><td><input type="radio" name="eig14" value="2"></td><td><input type="radio" name="eig14" value="3"></td></tr>
							<tr><td>呼吸困难</td><td><input type="radio" name="eig15" value="0"></td><td><input type="radio" name="eig15" value="1"></td><td><input type="radio" name="eig15" value="2"></td><td><input type="radio" name="eig15" value="3"></td></tr>
							<tr><td>害怕即将死亡</td><td><input type="radio" name="eig16" value="0"></td><td><input type="radio" name="eig16" value="1"></td><td><input type="radio" name="eig16" value="2"></td><td><input type="radio" name="eig16" value="3"></td></tr>
							<tr><td>惊慌</td><td><input type="radio" name="eig17" value="0"></td><td><input type="radio" name="eig17" value="1"></td><td><input type="radio" name="eig17" value="2"></td><td><input type="radio" name="eig17" value="3"></td></tr>
							<tr><td>消化不良或肚子不适</td><td><input type="radio" name="eig18" value="0"></td><td><input type="radio" name="eig18" value="1"></td><td><input type="radio" name="eig18" value="2"></td><td><input type="radio" name="eig18" value="3"></td></tr>
							<tr><td>晕倒/昏厥</td><td><input type="radio" name="eig19" value="0"></td><td><input type="radio" name="eig19" value="1"></td><td><input type="radio" name="eig19" value="2"></td><td><input type="radio" name="eig19" value="3"></td></tr>
							<tr><td>脸颊泛红</td><td><input type="radio" name="eig20" value="0"></td><td><input type="radio" name="eig20" value="1"></td><td><input type="radio" name="eig20" value="2"></td><td><input type="radio" name="eig20" value="3"></td></tr>
							<tr><td>流汗</td><td><input type="radio" name="eig21" value="0"></td><td><input type="radio" name="eig21" value="1"></td><td><input type="radio" name="eig21" value="2"></td><td><input type="radio" name="eig21" value="3"></td></tr>
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
		<div id="footer_content">
			<div class="footer_copy">Copyright © 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>
</body>
</html>