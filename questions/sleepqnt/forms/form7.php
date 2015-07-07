<?php

 
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 7;
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
	 

    for($i=1; $i<=21; $i++)
	{
		$iname = 'sev'.$i;
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
		header('Location: form8.php');
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
<title>form7</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:270px;}
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
			<h1>表7 贝克情绪自评量表1 </h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form7" onsubmit="return checkFull(21);">
				<!--page1-->
					<div class="m1 mbox">
						<p>说明：这份问卷有21组陈述。仔细阅读每一组陈述，然后根据您近一周（包括今天）的感觉，从每一组选一条最适合您情况的项目，
						先把每组陈述全部看完，再选择项目。</p>
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>一</td>
							<td><p><input type="radio" name="sev1" value="0">我不感到悲伤<br/><input type="radio" name="sev1" value="1">我感到悲伤<br/><input type="radio" name="sev1" value="2">我始终悲伤，不能自制<br/><input type="radio" name="sev1" value="3">我太悲伤或不愉快，不堪忍受</p></td></tr>
							<tr><td>二</td>
							<td><p><input type="radio" name="sev2" value="0">我对将来并不失望<br/><input type="radio" name="sev2" value="1">对未来我感到心灰意冷<br/><input type="radio" name="sev2" value="2">我感到全景暗淡<br/><input type="radio" name="sev2" value="3">我觉得将来毫无希望，无法改善</p></td></tr>
						</table>						
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>三</td>
							<td><p><input type="radio" name="sev3" value="0">我没有感到失败<br/><input type="radio" name="sev3" value="1">我觉得比一般人失败要多一些<br/><input type="radio" name="sev3" value="2">回首往事，我能看到的是很多次失败<br/><input type="radio" name="sev3" value="3">我觉得我是一个完全失败的人</p></td></tr>
							<tr><td>四</td>
							<td><p><input type="radio" name="sev4" value="0">我和以前一样，从各种事件中得到满足<br/><input type="radio" name="sev4" value="1">我不象往常一样从各种事件中得到满足<br/><input type="radio" name="sev4" value="2"> 我不再能从各种事件中得到真正的满足<br/><input type="radio" name="sev4" value="3"> 我对一切事情都不满意或感.-到枯燥无味</p></td></tr>
							<tr><td>五</td>
							<td><p><input type="radio" name="sev5" value="0">我不感到罪过<br/><input type="radio" name="sev5" value="1">我在相当部分的时间里感到罪过<br/><input type="radio" name="sev5" value="2">我在大部分时间里觉得有罪 <br/><input type="radio" name="sev5" value="3">我在任何时候都觉得有罪</p></td></tr>
						</table>
					</div>
				<!--page3-->
					<div class="m3 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>六</td>
							<td><p><input type="radio" name="sev6" value="0">我没有觉得受到惩罚 <br/><input type="radio" name="sev6" value="1">我觉得可能受到惩罚 <br/><input type="radio" name="sev6" value="2">我预料将受到惩罚 <br/><input type="radio" name="sev6" value="3">我觉得正受到惩罚</p></td></tr>
							<tr><td>七</td>
							<td><p><input type="radio" name="sev7" value="0">我对自己并不失望<br/><input type="radio" name="sev7" value="1">我对自己感到失望<br/><input type="radio" name="sev7" value="2">我对自己感到讨厌 <br/><input type="radio" name="sev7" value="3">我恨我自己</p></td></tr>
							<tr><td>八</td>
							<td><p><input type="radio" name="sev8" value="0">我觉得我并不比其他人更不好<br/><input type="radio" name="sev8" value="1">我对自己的弱点和错误要批判<br/><input type="radio" name="sev8" value="2">我在所有的时间里都责备自己的过错<br/><input type="radio" name="sev8" value="3">我责备自己所有的事情都弄坏了</p></td></tr>
						</table>
					</div>
				<!--page4-->
					<div class="m4 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>九</td>
							<td><p><input type="radio" name="sev9" value="0">我没有任何想弄死自己的想法<br/><input type="radio" name="sev9" value="1">我有自杀的想法，但我不会去做<br/><input type="radio" name="sev9" value="2">我想自杀<br/><input type="radio" name="sev9" value="3">如果有机会我就自杀</p></td></tr>
							<tr><td>十</td>
							<td><p><input type="radio" name="sev10" value="0">我哭泣和往常一样<br/><input type="radio" name="sev10" value="1">我比往常哭的多<br/><input type="radio" name="sev10" value="2">我现在一直要哭 <br/><input type="radio" name="sev10" value="3">我过去能哭，但现在要哭也哭不出来</p></td></tr>
							<tr><td>十一</td>
							<td><p><input type="radio" name="sev11" value="0">和过去相比，我现在生气并不多<br/><input type="radio" name="sev11" value="1">我现在比往常更容易生气发火<br/><input type="radio" name="sev11" value="2">我觉得现在所有的时间都容易生气 <br/><input type="radio" name="sev11" value="3">过去使我生气的事，现在 一点也不能使我生气了</p></td></tr>
						</table>
					</div>
				<!--page5-->
					<div class="m5 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>十二</td>
							<td><p><input type="radio" name="sev12" value="0">我对其他人没有失去兴趣 <br/><input type="radio" name="sev12" value="1">和过去相比，我对别人的兴趣减少了<br/><input type="radio" name="sev12" value="2">我对别人的兴趣大部分失去了 <br/><input type="radio" name="sev12" value="3">我对别人的兴趣已全部丧失了</p></td></tr>
							<tr><td>十三</td>
							<td><p><input type="radio" name="sev13" value="0">我作决定和过去一样好<br/><input type="radio" name="sev13" value="1">我推迟作出决定比过去多了<br/><input type="radio" name="sev13" value="2">我作决定比以前困难大的多 <br/><input type="radio" name="sev13" value="3">我再也不能作出决定了</p></td></tr>
							<tr><td>十四</td>
							<td><p><input type="radio" name="sev14" value="0">我觉得看上去我的外表并不比过去差<br/><input type="radio" name="sev14" value="1">我担心看上去我显得老了，没有吸引力了<br/><input type="radio" name="sev14" value="2">我觉得我的外貌有些固定的 变化，使我难看了<br/><input type="radio" name="sev14" value="3">我相信我看起来很丑陋</p></td></tr>
						</table>
					</div>
				<!--page6-->
					<div class="m6 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>十五</td>
							<td><p><input type="radio" name="sev15" value="0">我工作和以前一样好<br/><input type="radio" name="sev15" value="1">要着手做事，我现在要额外  花些力气<br/><input type="radio" name="sev15" value="2">无论做什么事我必须努力 <br/><input type="radio" name="sev15" value="3">我什么工作也不能做了催促自己才行</p></td></tr>
							<tr><td>十六</td>
							<td><p><input type="radio" name="sev16" value="0">我睡觉与往常一样好 <br/><input type="radio" name="sev16" value="1">我睡觉不如过去好<br/><input type="radio" name="sev16" value="2">我比往常早醒1～2小时，难以再入睡<br/><input type="radio" name="sev16" value="3">我比往常早醒几个小时，不能再睡</p></td></tr>
							<tr><td>十七</td>
							<td><p><input type="radio" name="sev17" value="0">我并不感到比往常更疲乏<br/><input type="radio" name="sev17" value="1">我比过去更容易感到疲乏<br/><input type="radio" name="sev17" value="2">几乎不管做什么，我都感到疲乏无力<br/><input type="radio" name="sev17" value="3">我太疲乏无力，不能做任何事情</p></td></tr>
						</table>
					</div>
				<!--page7-->
					<div class="m7 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>十八</td>
							<td><p><input type="radio" name="sev18" value="0">我的食欲与往常一样 <br/><input type="radio" name="sev18" value="1">我的食欲不如过去好<br/><input type="radio" name="sev18" value="2">我现在的食欲差得多了<br/><input type="radio" name="sev18" value="3">我一点也没有食欲了</p></td></tr>
							<tr><td>十九</td>
							<td><p><input type="radio" name="sev19" value="0">最近我的体重并无很大减轻<br/><input type="radio" name="sev19" value="1">我的体重下降了5磅（约2.25kg）以上<br/><input type="radio" name="sev19" value="2">我的体重下降了10 磅以上<br/><input type="radio" name="sev19" value="3">我的体重下降15磅以上</p></td></tr>
							<tr><td>二十</td>
							<td><p><input type="radio" name="sev20" value="0">我对最近的健康状况并不比往常更担心 <br/><input type="radio" name="sev20" value="1">我担心身体上的问题，如 疼痛、胃不适或便秘<br/><input type="radio" name="sev20" value="2">我非常担心身体问题，想别的事情很难  <br/><input type="radio" name="sev20" value="3">我对身体问题如此担忧，以致不能想其他任何事情</p></td></tr>
						</table>
					</div>
				<!--page8-->
					<div class="m8 mbox">
						<table cellpadding="0" cellspacing="0" class="setTable">
							<tr><td>序号</td><td>项目</td></tr>
							<tr><td>二十一</td>
							<td><p><input type="radio" name="sev21" value="0">我没有发现我对性的兴趣最近有什么变化<br/><input type="radio" name="sev21" value="1">我对性的兴趣比过去降低了<br/><input type="radio" name="sev21" value="2">现在我对性的兴趣又大下降<br/><input type="radio" name="sev21" value="3">我对性的兴趣已经完全丧失</p></td></tr>
						</table>
						<br/><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name="submitform" value="提交" class="button2">
					</div>
				<!--page9-->
					<div class="m9 mbox">

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