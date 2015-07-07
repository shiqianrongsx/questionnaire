<?php
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{	
	//判断是否填写基本信息
	$query="select name from users1 where name='Basic".$_REQUEST['one1']."';";
	$result=executeQuery($query);
	$r=mysql_fetch_array($result);
	if(!$r['name']){die("您还没有填写基本信息,点击<a href='../../basic/index.php'>这里</a>填写");}
	//若已填写基本信息
	$error=false;
	$_SESSION['studentname'] = "PartThree".htmlspecialchars($_REQUEST['one1'],ENT_QUOTES);
    $result=executeQuery("select name from users3 where name ='".$_SESSION['studentname']."';");
	$r=mysql_fetch_array($result);
    if(is_null($r['name'])){
		$query="insert users3 (name) value('".$_SESSION['studentname']."');";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't access database1.".' Because '. mysql_error();
		goto end;
		}
		$query="CREATE TABLE ".$_SESSION['studentname']."(like test);";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't create table1.".' Because '. mysql_error();
		goto end;
		}		
		}
	else{
		$query="drop table ".$_SESSION['studentname'].";";//清除表格
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't drop table.".' Because '. mysql_error();
		goto end;
		}
		$query="delete from users3 where name = '".$_SESSION['studentname']."';";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't delete record.".' Because '. mysql_error();
		goto end;
		}
		$query="insert users3 (name) value('".$_SESSION['studentname']."');";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't access database2.".' Because '. mysql_error();
		goto end;
		}
		$query="CREATE TABLE ".$_SESSION['studentname']."(like test);";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't create table2.".' Because '. mysql_error();
		goto end;
		}
	}
	 
	$formid = 1;
	/*$result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
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
	}*/
    for($i=1; $i<=1; $i++)
	{
		$iname = 'one'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{	
		$error=true;
		$_GLOBALS['message']="Your previous answer is not updated.Please answer once again.".' Because '.mysql_error();
		break;
		}
	}
	closedb();
	if(!$error){
		header('Location: form2.php');
	}
	end:
			unset($_REQUEST['submitform']);		
			echo '<font style="color:white;">'.$_GLOBALS['message'].'</font>';			
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>form1</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<script src="../scripts/validateID.js" type="text/javascript"></script>
<script src="../scripts/validatemobile.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:350px;}
	table{margin-top:50px;}
</style>
<script type="text/javascript">

</script>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表1 基本信息</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form1" onsubmit="return checkFull(0);">
				<!--page1-->
					<div class="m1 mbox">
					<table cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td>身份证号（重要）</td>
						<td colspan="3"><input type="text" name="one1" class="textLong" onblur="checkResult(this)" maxlength="18"></td>
						</tr>
					</table>
					<br/><br/><br/>
					<input type="reset" value="重置" class="button2"/>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="submit" name= "submitform" value="提交" class="button2"/>
					</div>
				<!--page2-->
					<div class="m2 mbox">
					</div>
					</form>
				</div>
				<div class="page">
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