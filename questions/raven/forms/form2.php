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
	 

    for($i=1; $i<=60; $i++)
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
		header('Location:../finish.html');
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
<title>form1</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{margin-left:50px}
	#wrap .menu li{margin-right:18px;}
	.textShort{font-size:16px;font-weight:bold;}
	.mbox img{width:250px;height:280px;}
	table{color:white;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表1 Raven’s标准推理测验</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form1" onsubmit="return checkFull(60);">
				<!--page1-->
					<div class="m1 mbox">
					<p>指导语：以下每个题目都有一定的主题，但是每张大图都缺少一部分。大图以下有6至8张小图，将其中一张小图填补在大图的空缺部分，使整个大图合理、完整。（注：对于看不清的图，可按Ctrl同时滚动鼠标来进行放大和缩小）</p>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETA1.jpg"></td><td>1<input type="radio" name="two1" value="1"><br/>2<input type="radio" name="two1" value="2"><br/>3<input type="radio" name="two1" value="3"><br/>4<input type="radio" name="two1" value="4"><br/>5<input type="radio" name="two1" value="5"><br/>6<input type="radio" name="two1" value="6"></td>
							<td><img src="../images/form12/SETA2.jpg"></td><td>1<input type="radio" name="two2" value="1"><br/>2<input type="radio" name="two2" value="2"><br/>3<input type="radio" name="two2" value="3"><br/>4<input type="radio" name="two2" value="4"><br/>5<input type="radio" name="two2" value="5"><br/>6<input type="radio" name="two2" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETA3.jpg"></td><td>1<input type="radio" name="two3" value="1"><br/>2<input type="radio" name="two3" value="2"><br/>3<input type="radio" name="two3" value="3"><br/>4<input type="radio" name="two3" value="4"><br/>5<input type="radio" name="two3" value="5"><br/>6<input type="radio" name="two3" value="6"></td>
							<td><img src="../images/form12/SETA4.jpg"></td><td>1<input type="radio" name="two4" value="1"><br/>2<input type="radio" name="two4" value="2"><br/>3<input type="radio" name="two4" value="3"><br/>4<input type="radio" name="two4" value="4"><br/>5<input type="radio" name="two4" value="5"><br/>6<input type="radio" name="two4" value="6"></td>
							</tr>

						</table>
					</div>
				<!--page3-->
					<div class="m3 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETA5.jpg"></td><td>1<input type="radio" name="two5" value="1"><br/>2<input type="radio" name="two5" value="2"><br/>3<input type="radio" name="two5" value="3"><br/>4<input type="radio" name="two5" value="4"><br/>5<input type="radio" name="two5" value="5"><br/>6<input type="radio" name="two5" value="6"></td>
							<td><img src="../images/form12/SETA6.jpg"></td><td>1<input type="radio" name="two6" value="1"><br/>2<input type="radio" name="two6" value="2"><br/>3<input type="radio" name="two6" value="3"><br/>4<input type="radio" name="two6" value="4"><br/>5<input type="radio" name="two6" value=""><br/>6<input type="radio" name="two6" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETA7.jpg"></td><td>1<input type="radio" name="two7" value="1"><br/>2<input type="radio" name="two7" value="2"><br/>3<input type="radio" name="two7" value="3"><br/>4<input type="radio" name="two7" value="4"><br/>5<input type="radio" name="two7" value="5"><br/>6<input type="radio" name="two7" value="6"></td>
							<td><img src="../images/form12/SETA8.jpg"></td><td>1<input type="radio" name="two8" value="1"><br/>2<input type="radio" name="two8" value="2"><br/>3<input type="radio" name="two8" value="3"><br/>4<input type="radio" name="two8" value="4"><br/>5<input type="radio" name="two8" value="5"><br/>6<input type="radio" name="two8" value="6"></td>
							</tr>
						</table>
					</div>
				<!--page4-->
					<div class="m4 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETA9.jpg"></td><td>1<input type="radio" name="two9" value="1"><br/>2<input type="radio" name="two9" value="2"><br/>3<input type="radio" name="two9" value="3"><br/>4<input type="radio" name="two9" value="4"><br/>5<input type="radio" name="two9" value="5"><br/>6<input type="radio" name="two9" value="6"></td>
							<td><img src="../images/form12/SETA10.jpg"></td><td>1<input type="radio" name="two10" value="1"><br/>2<input type="radio" name="two10" value="2"><br/>3<input type="radio" name="two10" value="3"><br/>4<input type="radio" name="two10" value="4"><br/>5<input type="radio" name="two10" value="5"><br/>6<input type="radio" name="two10" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETA11.jpg"></td><td>1<input type="radio" name="two11" value="1"><br/>2<input type="radio" name="two11" value="2"><br/>3<input type="radio" name="two11" value="3"><br/>4<input type="radio" name="two11" value="4"><br/>5<input type="radio" name="two11" value="5"><br/>6<input type="radio" name="two11" value="6"></td>
							<td><img src="../images/form12/SETA12.jpg"></td><td>1<input type="radio" name="two12" value="1"><br/>2<input type="radio" name="two12" value="2"><br/>3<input type="radio" name="two12" value="3"><br/>4<input type="radio" name="two12" value="4"><br/>5<input type="radio" name="two12" value="5"><br/>6<input type="radio" name="two12" value="6"></td>
							</tr>
						</table>
					</div>
				<!--page5-->
					<div class="m5 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETB1.jpg"></td><td>1<input type="radio" name="two13" value="1"><br/>2<input type="radio" name="two13" value="2"><br/>3<input type="radio" name="two13" value="3"><br/>4<input type="radio" name="two13" value="4"><br/>5<input type="radio" name="two13" value="5"><br/>6<input type="radio" name="two13" value="6"></td>
							<td><img src="../images/form12/SETB2.jpg"></td><td>1<input type="radio" name="two14" value="1"><br/>2<input type="radio" name="two14" value="2"><br/>3<input type="radio" name="two14" value="3"><br/>4<input type="radio" name="two14" value="4"><br/>5<input type="radio" name="two14" value="5"><br/>6<input type="radio" name="two14" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETB3.jpg"></td><td>1<input type="radio" name="two15" value="1"><br/>2<input type="radio" name="two15" value="2"><br/>3<input type="radio" name="two15" value="3"><br/>4<input type="radio" name="two15" value="4"><br/>5<input type="radio" name="two15" value="5"><br/>6<input type="radio" name="two15" value="6"></td>
							<td><img src="../images/form12/SETB4.jpg"></td><td>1<input type="radio" name="two16" value="1"><br/>2<input type="radio" name="two16" value="2"><br/>3<input type="radio" name="two16" value="3"><br/>4<input type="radio" name="two16" value="4"><br/>5<input type="radio" name="two16" value="5"><br/>6<input type="radio" name="two16" value="6"></td>
							</tr>
						</table>
					</div>				
				<!--page6-->
					<div class="m6 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
														<tr>
							<td><img src="../images/form12/SETB5.jpg"></td><td>1<input type="radio" name="two17" value="1"><br/>2<input type="radio" name="two17" value="2"><br/>3<input type="radio" name="two17" value="3"><br/>4<input type="radio" name="two17" value="4"><br/>5<input type="radio" name="two17" value="5"><br/>6<input type="radio" name="two17" value="6"></td>
							<td><img src="../images/form12/SETB6.jpg"></td><td>1<input type="radio" name="two18" value="1"><br/>2<input type="radio" name="two18" value="2"><br/>3<input type="radio" name="two18" value="3"><br/>4<input type="radio" name="two18" value="4"><br/>5<input type="radio" name="two18" value="5"><br/>6<input type="radio" name="two18" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETB7.jpg"></td><td>1<input type="radio" name="two19" value="1"><br/>2<input type="radio" name="two19" value="2"><br/>3<input type="radio" name="two19" value="3"><br/>4<input type="radio" name="two19" value="4"><br/>5<input type="radio" name="two19" value="5"><br/>6<input type="radio" name="two19" value="6"></td>
							<td><img src="../images/form12/SETB8.jpg"></td><td>1<input type="radio" name="two20" value="1"><br/>2<input type="radio" name="two20" value="2"><br/>3<input type="radio" name="two20" value="3"><br/>4<input type="radio" name="two20" value="4"><br/>5<input type="radio" name="two20" value="5"><br/>6<input type="radio" name="two20" value="6"></td>
							</tr>
						</table>
					</div>
				<!--page7-->
					<div class="m7 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETB9.jpg"></td><td>1<input type="radio" name="two21" value="1"><br/>2<input type="radio" name="two21" value="2"><br/>3<input type="radio" name="two21" value="3"><br/>4<input type="radio" name="two21" value="4"><br/>5<input type="radio" name="two21" value="5"><br/>6<input type="radio" name="two21" value="6"></td>
							<td><img src="../images/form12/SETB10.jpg"></td><td>1<input type="radio" name="two22" value="1"><br/>2<input type="radio" name="two22" value="2"><br/>3<input type="radio" name="two22" value="3"><br/>4<input type="radio" name="two22" value="4"><br/>5<input type="radio" name="two22" value="5"><br/>6<input type="radio" name="two22" value="6"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETB11.jpg"></td><td>1<input type="radio" name="two23" value="1"><br/>2<input type="radio" name="two23" value="2"><br/>3<input type="radio" name="two23" value="3"><br/>4<input type="radio" name="two23" value="4"><br/>5<input type="radio" name="two23" value="5"><br/>6<input type="radio" name="two23" value="6"></td>
							<td><img src="../images/form12/SETB12.jpg"></td><td>1<input type="radio" name="two24" value="1"><br/>2<input type="radio" name="two24" value="2"><br/>3<input type="radio" name="two24" value="3"><br/>4<input type="radio" name="two24" value="4"><br/>5<input type="radio" name="two24" value="5"><br/>6<input type="radio" name="two24" value="6"></td>
							</tr>
						</table>
					</div>			
				<!--page8-->
					<div class="m8 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETC1.jpg"></td><td>1<input type="radio" name="two25" value="1"><br/>2<input type="radio" name="two25" value="2"><br/>3<input type="radio" name="two25" value="3"><br/>4<input type="radio" name="two25" value="4"><br/>5<input type="radio" name="two25" value="5"><br/>6<input type="radio" name="two25" value="6"><br/>7<input type="radio" name="two25" value="7"><br/>8<input type="radio" name="two25" value="8"></td>
							<td><img src="../images/form12/SETC2.jpg"></td><td>1<input type="radio" name="two26" value="1"><br/>2<input type="radio" name="two26" value="2"><br/>3<input type="radio" name="two26" value="3"><br/>4<input type="radio" name="two26" value="4"><br/>5<input type="radio" name="two26" value="5"><br/>6<input type="radio" name="two26" value="6"><br/>7<input type="radio" name="two26" value="7"><br/>8<input type="radio" name="two26" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETC3.jpg"></td><td>1<input type="radio" name="two27" value="1"><br/>2<input type="radio" name="two27" value="2"><br/>3<input type="radio" name="two27" value="3"><br/>4<input type="radio" name="two27" value="4"><br/>5<input type="radio" name="two27" value="5"><br/>6<input type="radio" name="two27" value="6"><br/>7<input type="radio" name="two27" value="7"><br/>8<input type="radio" name="two27" value="8"></td>
							<td><img src="../images/form12/SETC4.jpg"></td><td>1<input type="radio" name="two28" value="1"><br/>2<input type="radio" name="two28" value="2"><br/>3<input type="radio" name="two28" value="3"><br/>4<input type="radio" name="two28" value="4"><br/>5<input type="radio" name="two28" value="5"><br/>6<input type="radio" name="two28" value="6"><br/>7<input type="radio" name="two28" value="7"><br/>8<input type="radio" name="two28" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page9-->
					<div class="m9 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
														<tr>
							<td><img src="../images/form12/SETC5.jpg"></td><td>1<input type="radio" name="two29" value="1"><br/>2<input type="radio" name="two29" value="2"><br/>3<input type="radio" name="two29" value="3"><br/>4<input type="radio" name="two29" value="4"><br/>5<input type="radio" name="two29" value="5"><br/>6<input type="radio" name="two29" value="6"><br/>7<input type="radio" name="two29" value="7"><br/>8<input type="radio" name="two29" value="8"></td>
							<td><img src="../images/form12/SETC6.jpg"></td><td>1<input type="radio" name="two30" value="1"><br/>2<input type="radio" name="two30" value="2"><br/>3<input type="radio" name="two30" value="3"><br/>4<input type="radio" name="two30" value="4"><br/>5<input type="radio" name="two30" value="5"><br/>6<input type="radio" name="two30" value="6"><br/>7<input type="radio" name="two30" value="7"><br/>8<input type="radio" name="two30" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETC7.jpg"></td><td>1<input type="radio" name="two31" value="1"><br/>2<input type="radio" name="two31" value="2"><br/>3<input type="radio" name="two31" value="3"><br/>4<input type="radio" name="two31" value="4"><br/>5<input type="radio" name="two31" value="5"><br/>6<input type="radio" name="two31" value="6"><br/>7<input type="radio" name="two31" value="7"><br/>8<input type="radio" name="two31" value="8"></td>
							<td><img src="../images/form12/SETC8.jpg"></td><td>1<input type="radio" name="two32" value="1"><br/>2<input type="radio" name="two32" value="2"><br/>3<input type="radio" name="two32" value="3"><br/>4<input type="radio" name="two32" value="4"><br/>5<input type="radio" name="two32" value="5"><br/>6<input type="radio" name="two32" value="6"><br/>7<input type="radio" name="two32" value="7"><br/>8<input type="radio" name="two32" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page10-->
					<div class="m10 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETC9.jpg"></td><td>1<input type="radio" name="two33" value="1"><br/>2<input type="radio" name="two33" value="2"><br/>3<input type="radio" name="two33" value="3"><br/>4<input type="radio" name="two33" value="4"><br/>5<input type="radio" name="two33" value="5"><br/>6<input type="radio" name="two33" value="6"><br/>7<input type="radio" name="two33" value="7"><br/>8<input type="radio" name="two33" value="8"></td>
							<td><img src="../images/form12/SETC10.jpg"></td><td>1<input type="radio" name="two34" value="1"><br/>2<input type="radio" name="two34" value="2"><br/>3<input type="radio" name="two34" value="3"><br/>4<input type="radio" name="two34" value="4"><br/>5<input type="radio" name="two34" value="5"><br/>6<input type="radio" name="two34" value="6"><br/>7<input type="radio" name="two34" value="7"><br/>8<input type="radio" name="two34" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETC11.jpg"></td><td>1<input type="radio" name="two35" value="1"><br/>2<input type="radio" name="two35" value="2"><br/>3<input type="radio" name="two35" value="3"><br/>4<input type="radio" name="two35" value="4"><br/>5<input type="radio" name="two35" value="5"><br/>6<input type="radio" name="two35" value="6"><br/>7<input type="radio" name="two35" value="7"><br/>8<input type="radio" name="two35" value="8"></td>
							<td><img src="../images/form12/SETC12.jpg"></td><td>1<input type="radio" name="two36" value="1"><br/>2<input type="radio" name="two36" value="2"><br/>3<input type="radio" name="two36" value="3"><br/>4<input type="radio" name="two36" value="4"><br/>5<input type="radio" name="two36" value="5"><br/>6<input type="radio" name="two36" value="6"><br/>7<input type="radio" name="two36" value="7"><br/>8<input type="radio" name="two36" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page11-->
					<div class="m11 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETD1.jpg"></td><td>1<input type="radio" name="two37" value="1"><br/>2<input type="radio" name="two37" value="2"><br/>3<input type="radio" name="two37" value="3"><br/>4<input type="radio" name="two37" value="4"><br/>5<input type="radio" name="two37" value="5"><br/>6<input type="radio" name="two37" value="6"><br/>7<input type="radio" name="two37" value="7"><br/>8<input type="radio" name="two37" value="8"></td>
							<td><img src="../images/form12/SETD2.jpg"></td><td>1<input type="radio" name="two38" value="1"><br/>2<input type="radio" name="two38" value="2"><br/>3<input type="radio" name="two38" value="3"><br/>4<input type="radio" name="two38" value="4"><br/>5<input type="radio" name="two38" value="5"><br/>6<input type="radio" name="two38" value="6"><br/>7<input type="radio" name="two38" value="7"><br/>8<input type="radio" name="two38" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETD3.jpg"></td><td>1<input type="radio" name="two39" value="1"><br/>2<input type="radio" name="two39" value="2"><br/>3<input type="radio" name="two39" value="3"><br/>4<input type="radio" name="two39" value="4"><br/>5<input type="radio" name="two39" value="5"><br/>6<input type="radio" name="two39" value="6"><br/>7<input type="radio" name="two39" value="7"><br/>8<input type="radio" name="two39" value="8"></td>
							<td><img src="../images/form12/SETD4.jpg"></td><td>1<input type="radio" name="two40" value="1"><br/>2<input type="radio" name="two40" value="2"><br/>3<input type="radio" name="two40" value="3"><br/>4<input type="radio" name="two40" value="4"><br/>5<input type="radio" name="two40" value="5"><br/>6<input type="radio" name="two40" value="6"><br/>7<input type="radio" name="two40" value="7"><br/>8<input type="radio" name="two40" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page12-->
					<div class="m12 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETD5.jpg"></td><td>1<input type="radio" name="two41" value="1"><br/>2<input type="radio" name="two41" value="2"><br/>3<input type="radio" name="two41" value="3"><br/>4<input type="radio" name="two41" value="4"><br/>5<input type="radio" name="two41" value="5"><br/>6<input type="radio" name="two41" value="6"><br/>7<input type="radio" name="two41" value="7"><br/>8<input type="radio" name="two41" value="8"></td>
							<td><img src="../images/form12/SETD6.jpg"></td><td>1<input type="radio" name="two42" value="1"><br/>2<input type="radio" name="two42" value="2"><br/>3<input type="radio" name="two42" value="3"><br/>4<input type="radio" name="two42" value="4"><br/>5<input type="radio" name="two42" value="5"><br/>6<input type="radio" name="two42" value="6"><br/>7<input type="radio" name="two42" value="7"><br/>8<input type="radio" name="two42" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETD7.jpg"></td><td>1<input type="radio" name="two43" value="1"><br/>2<input type="radio" name="two43" value="2"><br/>3<input type="radio" name="two43" value="3"><br/>4<input type="radio" name="two43" value="4"><br/>5<input type="radio" name="two43" value="5"><br/>6<input type="radio" name="two43" value="6"><br/>7<input type="radio" name="two43" value="7"><br/>8<input type="radio" name="two43" value="8"></td>
							<td><img src="../images/form12/SETD8.jpg"></td><td>1<input type="radio" name="two44" value="1"><br/>2<input type="radio" name="two44" value="2"><br/>3<input type="radio" name="two44" value="3"><br/>4<input type="radio" name="two44" value="4"><br/>5<input type="radio" name="two44" value="5"><br/>6<input type="radio" name="two44" value="6"><br/>7<input type="radio" name="two44" value="7"><br/>8<input type="radio" name="two44" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page13-->
					<div class="m13 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETD9.jpg"></td><td>1<input type="radio" name="two45" value="1"><br/>2<input type="radio" name="two45" value="2"><br/>3<input type="radio" name="two45" value="3"><br/>4<input type="radio" name="two45" value="4"><br/>5<input type="radio" name="two45" value="5"><br/>6<input type="radio" name="two45" value="6"><br/>7<input type="radio" name="two45" value="7"><br/>8<input type="radio" name="two45" value="8"></td>
							<td><img src="../images/form12/SETD10.jpg"></td><td>1<input type="radio" name="two46" value="1"><br/>2<input type="radio" name="two46" value="2"><br/>3<input type="radio" name="two46" value="3"><br/>4<input type="radio" name="two46" value="4"><br/>5<input type="radio" name="two46" value="5"><br/>6<input type="radio" name="two46" value="6"><br/>7<input type="radio" name="two46" value="7"><br/>8<input type="radio" name="two46" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETD11.jpg"></td><td>1<input type="radio" name="two47" value="1"><br/>2<input type="radio" name="two47" value="2"><br/>3<input type="radio" name="two47" value="3"><br/>4<input type="radio" name="two47" value="4"><br/>5<input type="radio" name="two47" value="5"><br/>6<input type="radio" name="two47" value="6"><br/>7<input type="radio" name="two47" value="7"><br/>8<input type="radio" name="two47" value="8"></td>
							<td><img src="../images/form12/SETD12.jpg"></td><td>1<input type="radio" name="two48" value="1"><br/>2<input type="radio" name="two48" value="2"><br/>3<input type="radio" name="two48" value="3"><br/>4<input type="radio" name="two48" value="4"><br/>5<input type="radio" name="two48" value="5"><br/>6<input type="radio" name="two48" value="6"><br/>7<input type="radio" name="two48" value="7"><br/>8<input type="radio" name="two48" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page14-->
					<div class="m14 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETE1.jpg"></td><td>1<input type="radio" name="two49" value="1"><br/>2<input type="radio" name="two49" value="2"><br/>3<input type="radio" name="two49" value="3"><br/>4<input type="radio" name="two49" value="4"><br/>5<input type="radio" name="two49" value="5"><br/>6<input type="radio" name="two49" value="6"><br/>7<input type="radio" name="two49" value="7"><br/>8<input type="radio" name="two49" value="8"></td>
							<td><img src="../images/form12/SETE2.jpg"></td><td>1<input type="radio" name="two50" value="1"><br/>2<input type="radio" name="two50" value="2"><br/>3<input type="radio" name="two50" value="3"><br/>4<input type="radio" name="two50" value="4"><br/>5<input type="radio" name="two50" value="5"><br/>6<input type="radio" name="two50" value="6"><br/>7<input type="radio" name="two50" value="7"><br/>8<input type="radio" name="two50" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETE3.jpg"></td><td>1<input type="radio" name="two51" value="1"><br/>2<input type="radio" name="two51" value="2"><br/>3<input type="radio" name="two51" value="3"><br/>4<input type="radio" name="two51" value="4"><br/>5<input type="radio" name="two51" value="5"><br/>6<input type="radio" name="two51" value="6"><br/>7<input type="radio" name="two51" value="7"><br/>8<input type="radio" name="two51" value="8"></td>
							<td><img src="../images/form12/SETE4.jpg"></td><td>1<input type="radio" name="two52" value="1"><br/>2<input type="radio" name="two52" value="2"><br/>3<input type="radio" name="two52" value="3"><br/>4<input type="radio" name="two52" value="4"><br/>5<input type="radio" name="two52" value="5"><br/>6<input type="radio" name="two52" value="6"><br/>7<input type="radio" name="two52" value="7"><br/>8<input type="radio" name="two52" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page15-->
					<div class="m15 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETE5.jpg"></td><td>1<input type="radio" name="two53" value="1"><br/>2<input type="radio" name="two53" value="2"><br/>3<input type="radio" name="two53" value="3"><br/>4<input type="radio" name="two53" value="4"><br/>5<input type="radio" name="two53" value="5"><br/>6<input type="radio" name="two53" value="6"><br/>7<input type="radio" name="two53" value="7"><br/>8<input type="radio" name="two53" value="8"></td>
							<td><img src="../images/form12/SETE6.jpg"></td><td>1<input type="radio" name="two54" value="1"><br/>2<input type="radio" name="two54" value="2"><br/>3<input type="radio" name="two54" value="3"><br/>4<input type="radio" name="two54" value="4"><br/>5<input type="radio" name="two54" value="5"><br/>6<input type="radio" name="two54" value="6"><br/>7<input type="radio" name="two54" value="7"><br/>8<input type="radio" name="two54" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETE7.jpg"></td><td>1<input type="radio" name="two55" value="1"><br/>2<input type="radio" name="two55" value="2"><br/>3<input type="radio" name="two55" value="3"><br/>4<input type="radio" name="two55" value="4"><br/>5<input type="radio" name="two55" value="5"><br/>6<input type="radio" name="two55" value="6"><br/>7<input type="radio" name="two55" value="7"><br/>8<input type="radio" name="two55" value="8"></td>
							<td><img src="../images/form12/SETE8.jpg"></td><td>1<input type="radio" name="two56" value="1"><br/>2<input type="radio" name="two56" value="2"><br/>3<input type="radio" name="two56" value="3"><br/>4<input type="radio" name="two56" value="4"><br/>5<input type="radio" name="two56" value="5"><br/>6<input type="radio" name="two56" value="6"><br/>7<input type="radio" name="two56" value="7"><br/>8<input type="radio" name="two56" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page16-->
					<div class="m16 mbox">
						<table border="4px" cellpadding="0" cellspacing="0">
							<tr><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td><td width="350px"><strong>图形</strong></td><td><strong>您的选择</strong></td></tr>
							<tr>
							<td><img src="../images/form12/SETE9.jpg"></td><td>1<input type="radio" name="two57" value="1"><br/>2<input type="radio" name="two57" value="2"><br/>3<input type="radio" name="two57" value="3"><br/>4<input type="radio" name="two57" value="4"><br/>5<input type="radio" name="two57" value="5"><br/>6<input type="radio" name="two57" value="6"><br/>7<input type="radio" name="two57" value="7"><br/>8<input type="radio" name="two57" value="8"></td>
							<td><img src="../images/form12/SETE10.jpg"></td><td>1<input type="radio" name="two58" value="1"><br/>2<input type="radio" name="two58" value="2"><br/>3<input type="radio" name="two58" value="3"><br/>4<input type="radio" name="two58" value="4"><br/>5<input type="radio" name="two58" value="5"><br/>6<input type="radio" name="two58" value="6"><br/>7<input type="radio" name="two58" value="7"><br/>8<input type="radio" name="two58" value="8"></td>
							</tr>
							<tr>
							<td><img src="../images/form12/SETE11.jpg"></td><td>1<input type="radio" name="two59" value="1"><br/>2<input type="radio" name="two59" value="2"><br/>3<input type="radio" name="two59" value="3"><br/>4<input type="radio" name="two59" value="4"><br/>5<input type="radio" name="two59" value="5"><br/>6<input type="radio" name="two59" value="6"><br/>7<input type="radio" name="two59" value="7"><br/>8<input type="radio" name="two59" value="8"></td>
							<td><img src="../images/form12/SETE12.jpg"></td><td>1<input type="radio" name="two60" value="1"><br/>2<input type="radio" name="two60" value="2"><br/>3<input type="radio" name="two60" value="3"><br/>4<input type="radio" name="two60" value="4"><br/>5<input type="radio" name="two60" value="5"><br/>6<input type="radio" name="two60" value="6"><br/>7<input type="radio" name="two60" value="7"><br/>8<input type="radio" name="two60" value="8"></td>
							</tr>
						</table>
					</div>
				<!--page17-->
					<div class="m17 mbox">
						<p></p><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name="submitform" value="提交" class="button2">
					</div>
				<!--page18-->
					<div class="m18 mbox">
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
						<li class="l10">10</li>
						<li class="l11">11</li>
						<li class="l12">12</li>
						<li class="l13">13</li>
						<li class="l14">14</li>			
						<li class="l15">15</li>	
						<li class="l16">16</li>	
						<li class="l17">17</li>						
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