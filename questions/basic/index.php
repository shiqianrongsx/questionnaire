<?php
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$error=false;
	$_SESSION['studentname'] = "Basic".htmlspecialchars($_REQUEST['one12'],ENT_QUOTES);
    $result=executeQuery("select name from users1 where name ='".$_SESSION['studentname']."';");
	$r=mysql_fetch_array($result);
    if(is_null($r['name'])){
		$query="insert users1 (name) value('".$_SESSION['studentname']."');";
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
		$query="delete from users1 where name = '".$_SESSION['studentname']."';";
		if(!executeQuery($query))
		{
		$error=true;
		$_GLOBALS['message']="Can't delete record.".' Because '. mysql_error();
		goto end;
		}
		$query="insert users1 (name) value('".$_SESSION['studentname']."');";
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
    for($i=1; $i<=33; $i++)
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
		header('Location: finish.html');
	}
	end:
			unset($_REQUEST['submitform']);		
			echo '<font style="color:white;">'.$_GLOBALS['message'].'</font>';			
}
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!--DOCTYPE html-->
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>基本信息</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="scripts/jquery.js" type="text/javascript"></script>
<!--script src="scripts/validateForm.js" type="text/javascript"></script-->
<script src="scripts/setTable.js" type="text/javascript"></script>
<script src="scripts/validateID.js" type="text/javascript"></script>
<script src="scripts/validatemobile.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:350px;}
</style>
<script type="text/javascript">
	function checkFullSex(radioNum,count){
		var num=0;
		for(var i=0;i<count;i++){
			var obj=document.getElementsByTagName("input")[i];	
			//检查text框是否填写完整
			if(obj.type=="text"){				
				if(obj.value==""){
					 obj.focus();
					 alert("当前表单不能有空项");
					 return false;
				}			  
			}
			//检查radio框是否填写完整
			if(obj.type=="radio"){
				if(obj.checked==true){
					num++;
				}
			}
		}
		if(num<radioNum){alert("当前表单不能有空项"); return false;}
	}
	//对男女分别判断
	function checkFull(){
		var flag=false;
		var radios=document.getElementsByName('one3');
		for(var i=0;i<radios.length;i++){
			if(radios[i].checked){
				var sex=radios[i].value;
				if(sex=='男'){
					var count=document.getElementsByTagName("input").length-9;
					return checkFullSex(7,count);
				}else{
					var count=document.getElementsByTagName("input").length-2;
					return checkFullSex(8,count);
				}
				flag=true;
			}			
		}
		if(flag==false){alert('当前表单不能有空项');return false;}
	}
</script>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>基本信息</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form1" onsubmit="return checkFull();">
				<!--page1-->
					<div class="m1 mbox">
					<table cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td width="160px">姓名</td>
						<td width="170px"><input type="text" name="one1" class="textNormal"></td>
						<td width="160px">年龄</td>
						<td width="170px"><input type="text" name="one2" class="textUnit2">周岁</td>
						</tr>
						<tr>
						<td>性别</td>
						<td><input type="radio" name="one3" value="男">男<input type="radio" name="one3" value="女">女</td>
						<td>受教育程度</td>
						<td><input type="radio" name="one4" value="本科">本科<input type="radio" name="one4" value="硕士">硕士<input type="radio" name="one4" value="博士">博士</td>
						</tr>
						<tr>
						<td>年级</td>
						<td><input type="text" name="one5" class="textNormal"></td>
						<td>民族</td>
						<td><input type="text" name="one6" class="textUnit1">族</td>
						</tr>
						<tr>
						<td>宿舍号</td>
						<td><input type="text" name="one7" class="textNormal"></td>
						<td>电话</td>
						<td><input type="text" name="one8" class="textNormal" onchange="validatemobile(this.value)" maxlength="11"></td>
						</tr>
						<tr>
						<td>身高</td>
						<td><input type="text" name="one9" class="textUnit1">cm</td>
						<td>体重</td>
						<td><input type="text" name="one10" class="textUnit1">kg</td>
						</tr>
						<tr>
						<td>Email</td>
						<td colspan="3"><input type="text" name="one11" class="textLong"></td>
						</tr>
						<tr>
						<td>身份证号（重要）</td>
						<td colspan="3"><input type="text" name="one12" class="textLong" onblur="checkResult(this)" maxlength="18"></td>
						</tr>
						<tr>
						<td>个人编号（重要）</td>
						<td colspan="3"><input type="text" name="one13" class="textNormal">（咨询工作人员）</td>
						</tr>
						<tr>
						<td>出生地</td>
						<td colspan="3"><input type="text" name="one14" class="textLong"></td>
						</tr>
						<tr>
						<td>大学前长居住地</td>
						<td colspan="3"><input type="text" name="one15" class="textLong"></td>
						</tr>
						<tr>
						<td colspan="4">
						<div class="left">睡眠时间是否规律：</div>
						<div class="right">
						<input type="radio" name="one16" value="是">是&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="one16" value="否">否</div>
						</td>
						</tr>
						<tr>
						<td colspan="4">
						<div class="left">每日平均睡眠时间：</div>
						<input type="text" name="one17" class="textShort">小时
						<input type="text" name="one18" class="textShort">分钟
						</td>
						</tr>
						<tr>
						<td colspan="4">
						<div class="left">是否有午休习惯？（一周约几次）：</div>
						<div class="right">
						<input type="radio" name="one19" value="是" onclick="alert('请注明每周几次，每次多长时间')">是（<input type="text" name="one20" class="textShort" value="0" style="color:#fff;" onfocus="if(value=='0'){value='';this.style.color='black';}" onblur="if(value==''){value='0';this.style.color='#fff';}">次/周<input type="text" name="one21" class="textShort" value="0" style="color:#fff" onfocus="if(value=='0'){value='';this.style.color='black';}" onblur="if(value==''){value='0';this.style.color='#fff';}">分钟/次）
						<input type="radio" name="one19" value="否">否</div>
						</td>
						</tr>
						<tr>
						<td colspan="4">
						<div class="left">过去一年是否从事倒班工作（几次）：</div>
						<div class="right">
						<input type="radio" name="one22" value="是" onclick="alert('请注明次数')">是（<input type="text" name="one23" class="textShort" value="0" style="color:#FFF" onfocus="if(value=='0'){value='';this.style.color='black';}" onblur="if(value==''){value='0';this.style.color='#FFF';}">次）&nbsp&nbsp&nbsp
						<input type="radio" name="one22" value="否">否</div>
						</td>
						</tr>
					</table>
					</div>
				<!--page2-->
					<div class="m2 mbox">
					<table cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td colspan="4">
						<div class="left">过去三个月是否进行跨越1个时区以上的旅行：</div>
						<div class="right">
						<input type="radio" name="one24" value="是" onclick="alert('请注明时间地点')">是&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="one24" value="否">否</div>
						</td>
						</tr>
						<tr>
						<td colspan="4"><div class="left">如有，请注明时间地点：</div><input type="text" name="one25" class="textLong" value="无" style="color:#C6C6C1" onfocus="if(value=='无'){value='';this.style.color='black'}" onblur="if(value==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td colspan="4">
						<div class="left">有无睡眠相关疾病：</div>
						<div class="right">
						<input type="radio" name="one26" value="是" onclick="alert('请说明疾病名称和患病时间')">是&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="one26" value="否">否</div>
						</td>
						</tr>
						<tr>
						<td colspan="4"><div class="left">如有，请说明疾病名称和患病时间：</div><input type="text" name="one27" class="textLong" value="无" style="color:#C6C6C1" onfocus="if(value=='无'){value='';this.style.color='black'}" onblur="if(value==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td width="200px">平均每周饮酒</td>
						<td colspan="3"><input type="text" name="one28" class="textShort">单位（一个单位约等于1/2瓶啤酒或半两白酒）</td>
						</tr>
						<tr>
						<td width="200px">平均每周饮咖啡</td>
						<td colspan="3"><input type="text" name="one29" class="textShort">杯（1杯约等于冲泡1包20克的速溶咖啡）&nbsp&nbsp&nbsp&nbsp&nbsp</td>
						</tr>
						<tr>
						<td colspan="4">以下为女性志愿者填写：</td>
						</tr>
						<tr>
						<td>您的月经周期是否规律：</td>
						<td colspan="3">
						<input type="radio" name="one30" value="完全不规律">完全不规律&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="one30" value="大多数时间规律">大多数时间规律<br/>
						<input type="radio" name="one30" value="少数时间规律">少数时间规律&nbsp&nbsp&nbsp
						<input type="radio" name="one30" value="非常规律">非常规律&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						</td>
						</tr>
						<tr>
						<td colspan="4"><div class="left">您的月经周期：<input type="text" name="one31" class="textShort">天；
						平均每次月经持续时间：<input type="text" name="one32" class="textShort">天；
						初潮年龄：<input type="text" name="one33" class="textShort">岁
						</div>
						</td>
						</tr>						
					</table>
					<br/>
					<input type="reset" value="重置" class="button2"/>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="submit" value="提交" class="button2" name="submitform"/>
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