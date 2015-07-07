<?php
	 error_reporting(0);
     session_start();//也可以设置php.ini中的session.auto_start=1来自动对每个请求使用。开始了一个session的生命周期，也就是可以使用相关函数操作$_SESSION来管理session数据
     require_once 'db.php';
	if(isset($_REQUEST['submitform']))//isset检测变量是否设置
	{
	//take phone as id
	$_SESSION['studentname'] = "PartOne".htmlspecialchars($_REQUEST['one9'],ENT_QUOTES);//htmlspecialchars()把一些预定义的字符转换为html实体
    $result=executeQuery("select name from users where name ='".$_SESSION['studentname']."';");
	$r=mysql_fetch_array($result);
	echo $r['name'].'<br/>';
	$error = false;
	if(is_null($r['name'])){
		$query="insert users (name) value('".$_SESSION['studentname']."');";
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
		$query="delete from users where name = '".$_SESSION['studentname']."';";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't delete record.".' Because '. mysql_error();
		goto end;
		}
		$query="insert users (name) value('".$_SESSION['studentname']."');";
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
    for($i=1; $i<=11; $i++)
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
	//goto:goto 操作符可以用来跳转到程序中的另一位置。该目标位置可以用目标名称加上冒号来标记，而跳转指令是 goto 之后接上目标位置的标记。PHP 中的 goto 有一定限制，
	//目标位置只能位于同一个文件和作用域，也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。也无法跳入到任何循环或者 switch 结构中。可以跳出循环或者 switch，
	//通常的用法是用 goto 代替多层的 break。 
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
<script src="../scripts/validateemail.js" type="text/javascript"></script>
<script src="../scripts/validateID.js" type="text/javascript"></script>
<script src="../scripts/validatemobile.js" type="text/javascript"></script>

<style type="text/css">
	.setTable{margin:20px 0 50px 0;}
</style>
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
					<form action="" method="post" name="form1" onsubmit="return checkFull(2);">
				<!--page1-->
					<div class="m1 mbox">
					<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td width="160px">姓名</td>
						<td width="170px"><input type="text" name="one1" class="textNormal"></td>
						<td width="160px">性别</td>
						<td width="170px"><input type="radio" name="one2" value="男">男<input type="radio" name="one2" value="女">女</td>
						</tr>
						<tr>
						<td>年龄</td>
						<td><input type="text" name="one3" class="textUnit2">周岁</td>
						<td>民族</td>
						<td><input type="text" name="one4" class="textUnit1">族</td>
						</tr>
						<tr>
						<td>体重</td>
						<td><input type="text" name="one5" class="textUnit1">kg</td>
						<td>身高</td>
						<td><input type="text" name="one6" class="textUnit1">cm</td>
						</tr>
						<tr>
						<td>Email</td>
						<td><input type="text" name="one7" class="textNormal"></td>
						<td>电话</td>
						<td><input type="text" name="one8" class="textNormal" onblur="validatemobile(this.value)"></td>
						</tr>
						<tr>
						<td>身份证号（重要）</td>
						<td colspan="3"><input type="text" name="one9" class="textLong" onblur="checkResult(this)" maxlength="18"></td>
						</tr>
						<tr>
						<td>是否镶过金属牙或体内有金属异物</td>
						<td colspan="3"><input type="radio" name="one10" value="是" onclick="alert('若是请详细说明');">是<input type="radio" name="one10" value="否">否 若是请详细说明：<br/><input type="text" name="one11" class="textLong" value="无" style="color:#C6C6C1" onfocus="if(value=='无'){value='';this.style.color='black';}" onblur="if(value==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>						
					</table>
					<input type="reset" value="重置" class="button2"/>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="submit" name="submitform" value="提交" class="button2"/>
					</div>
				<!--page2-->
					<div class="m2 mbox">
					</div>
					</form>
				</div>
				<ul class="menu">
				
				</ul>
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