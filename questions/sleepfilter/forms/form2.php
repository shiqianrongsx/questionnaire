 <?php 
	  error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$error=false;
	$formid = 2;
    $result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
	$r=mysql_fetch_array($result);
    if(mysql_num_rows($result) != 0){
		$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
		if(!executeQuery($query))
		{
		$error = true;
		$_GLOBALS['message']="Can't drop database". mysql_error();
		goto end;
		}
	}	 
	
    for($i=1; $i<=22; $i++)
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
	if(!$error){
		header('Location: form3.php');
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
<title>form2</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/setTable.js" type="text/javascript"></script>
<style type="text/css">
	.setTable{margin:20px 0 50px 0}
	#wrap .page{padding-left:350px;}
</style>
<script type="text/javascript">
//获取表一中填写的性别
<?php
	$query="select answer from ".$_SESSION['studentname']." where formid=1 and questionid=2;";
	$result=executeQuery($query);
	if(!result){die(mysql_error());}
	$r=mysql_fetch_array($result,MYSQL_NUM);
?>
//针对男女答题的个数不同编写不同的判断程序
function checkFullAll(){
	var sex='<?php echo $r[0];?>';
	var count=document.getElementsByTagName("input").length;
	if(sex=='男'){
		return checkFull(count-3,12);
	}
	if(sex=='女'){
		return checkFull(count,13);
	}
}
function checkFull(count,radioNum){
	var num=0;
	
	for(var i=0;i<count;i++){
		var obj=document.getElementsByTagName("input")[i];
		if(obj.type=="text"){
			if(obj.value==""){
				obj.focus();
				alert('当前表单不能有空项');
				return false;
			}
		}
		if(obj.type=="radio"){
			if(obj.checked==true){
				num++;
			}
		}
	}
	if(num<radioNum){alert('当前表单不能有空项');return false;}
}
</script>
</head>
<body onload="setTableColor();">
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>表2 一般情况信息</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form2" onsubmit="return checkFullAll();">
				<!--page1-->
					<div class="m1 mbox">
					<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td width="200px;">吸烟</td>
						<td><input type="radio" name="two1" value="完全不吸">完全不吸&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="two1" value="1-5支/周">1-5支/周&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="two1" value="5支以上/周">5支以上/周</td>
						</tr>
						<tr>
						<td>平均每周饮酒</td>
						<td><input type="radio" name="two2" value="不饮酒">不饮酒&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="two2" value="少量饮酒，≤2瓶啤酒或3两白酒">少量饮酒，≤2瓶啤酒或3两白酒<br/><input type="radio" name="two2" value="经常饮酒，≥2瓶啤酒或3两白酒">经常饮酒，≥2瓶啤酒或3两白酒&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
						</tr>
						<tr>
						<td>平均每周饮咖啡</td>
						<td><input type="radio" name="two3" value="不喝咖啡">不喝咖啡&nbsp&nbsp&nbsp <input type="radio" name="two3" value="少量喝，≤10包（速溶咖啡20g/包）">少量喝，≤10包（速溶咖啡20g/包）<br/><input type="radio" name="two3" value="经常喝，≥10包（速溶咖啡20g/包）">经常喝，≥10包（速溶咖啡20g/包）&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
						</tr>
						<tr>
						<td>外科病史</td>
						<td><input type="radio" name="two4" value="无">无&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="two4" value="曾患脑外科" onclick="alert('请注明何种疾病和患病时间')">曾患脑外科&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="two4" value="曾患其它外科疾病" onclick="alert('请注明何种疾病和患病时间')">曾患其它外科疾病<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two5" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>心脏病</td>
						<td><input type="radio" name="two6" value="无">无&nbsp&nbsp&nbsp <input type="radio" name="two6" value="曾有轻度" onclick="alert('请注明何种疾病和患病时间')">曾有轻度&nbsp&nbsp&nbsp <input type="radio" name="two6" value="现有轻度" onclick="alert('请注明何种疾病和患病时间')">现有轻度&nbsp&nbsp&nbsp <input type="radio" name="two6" value="曾有重度病史" onclick="alert('请注明何种疾病和患病时间')">曾有重度病史<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two7" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>肺病</td>
						<td><input type="radio" name="two8" value="无">无&nbsp&nbsp&nbsp <input type="radio" name="two8" value="曾有轻度" onclick="alert('请注明何种疾病和患病时间')">曾有轻度&nbsp&nbsp&nbsp <input type="radio" name="two8" value="现有轻度" onclick="alert('请注明何种疾病和患病时间')">现有轻度&nbsp&nbsp&nbsp <input type="radio" name="two8" value="曾有重度病史" onclick="alert('请注明何种疾病和患病时间')">曾有重度病史<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two9" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>胃病</td>
						<td><input type="radio" name="two10" value="无">无&nbsp&nbsp&nbsp <input type="radio" name="two10" value="曾有轻度" onclick="alert('请注明何种疾病和患病时间')">曾有轻度&nbsp&nbsp&nbsp <input type="radio" name="two10" value="现有轻度" onclick="alert('请注明何种疾病和患病时间')">现有轻度&nbsp&nbsp&nbsp <input type="radio" name="two10" value="曾有重度病史" onclick="alert('请注明何种疾病和患病时间')">曾有重度病史<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two11" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>一级亲属精神类疾病史（抑郁症；精神分裂；偏执性精神病等）</td>
						<td><input type="radio" name="two12" value="无">无&nbsp&nbsp&nbsp <input type="radio" name="two12" value="曾有轻度" onclick="alert('请注明何种疾病和患病时间')">曾有轻度&nbsp&nbsp&nbsp <input type="radio" name="two12" value="现有轻度" onclick="alert('请注明何种疾病和患病时间')">现有轻度&nbsp&nbsp&nbsp <input type="radio" name="two12" value="曾有重度病史" onclick="alert('请注明何种疾病和患病时间')">曾有重度病史<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two13" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
					</table>
					</div>
				<!--page2-->
					<div class="m2 mbox">
						<table border="4px" cellpadding="0" cellspacing="0" class="setTable">
						<tr>
						<td>一级亲属神经类疾病史（癫痫；痴呆；中风；脑梗塞；脑肿瘤；重症肌无力等）</td>
						<td><input type="radio" name="two14" value="无">无&nbsp&nbsp <input type="radio" name="two14" value="曾有轻度" onclick="alert('请注明何种疾病和患病时间')">曾有轻度&nbsp&nbsp <input type="radio" name="two14" value="现有轻度" onclick="alert('请注明何种疾病和患病时间')">现有轻度&nbsp&nbsp <input type="radio" name="two14" value="曾有重度病史" onclick="alert('请注明何种疾病和患病时间')">曾有重度病史<br/>如有，请注明何种疾病和患病时间：<input type="text" name="two15" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td width="280px">当前是否服用催眠药、激素、抗抑郁或其它药物</td>
						<td><input type="radio" name="two16" value="是" onclick="alert('请注明药品名称')">是&nbsp&nbsp <input type="radio" name="two16" value="否">否&nbsp&nbsp&nbsp如有，请注明药品名称：<br/><input type="text" name="two17" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>是否长期服用催眠药、激素、抗抑郁或其它药物</td>
						<td><input type="radio" name="two18" value="是" onclick="alert('请注明药品名称')">是&nbsp&nbsp <input type="radio" name="two18" value="否">否&nbsp&nbsp&nbsp如有，请注明药品名称：<br/><input type="text" name="two19" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td>有无临床诊断的睡眠障碍，请说明</td>
						<td><input type="radio" name="two20" value="是" onclick="alert('请说明何种障碍')">是&nbsp&nbsp <input type="radio" name="two20" value="否">否&nbsp&nbsp&nbsp如有，请说明何种障碍：<br/><input type="text" name="two21" class="textLong" value="无" style="color:#C6C6C1" onfocus="if (value =='无'){value ='';this.style.color='black';}" onblur="if (value ==''){value='无';this.style.color='#C6C6C1';}"></td>
						</tr>
						<tr>
						<td colspan="2">以下为女性志愿者填写：</td>
						</tr>
						<tr>
						<td>您的月经周期是否规律：</td>
						<td>
						<input type="radio" name="two22" value="完全不规律">完全不规律&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="two22" value="大多数时间规律">大多数时间规律<br/>
						<input type="radio" name="two22" value="少数时间规律">少数时间规律&nbsp&nbsp&nbsp
						<input type="radio" name="two22" value="非常规律">非常规律&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						</td>
						</tr>
					</table>
					<input type="reset" value="重置" class="button2">
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="submit" name="submitform" value="提交" class="button2"/>
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
<!--
1.如有请注明患病时间，
	选中除了无之外的其他选项的时候，会自动聚焦到下一个地方，并且只有填了此项才可以进行下一道题目。
-->