<!DOCTYPE html>
<html>
<head>
<title>被试信息列表</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script src="../scripts/validateID.js" type="text/javascript"></script>
<script src="../scripts/highlight.js" type="text/javascript"></script>
<style type="text/css">
	.highlight{background:green;font-weight:bold;color:white;}
	.viewDetailsButton{display:block;margin-left:70px;}
</style>
</head>
<body>
	<br/>
	<form action="exactSearch.php" method="post">
		<font style="color:red;size:14px;font-weight:bold;">精确检索：</font>
		身份证号<input type="text" name="iID" id="ID1" style="width:170px;" onblur="checkResult(this)" maxlength="18">
		&nbsp&nbsp<input type="reset" value="重置" class="button2"/>
		&nbsp&nbsp&nbsp <input type="submit" value="提交" class="button2"/>
	</form>
	<form action="" method="post" onsubmit="highlight(this.text1.value);return false;">
		<font style="color:red;size:14px;font-weight:bold;">模糊检索：</font>
		关键字&nbsp&nbsp<input type="text" name="itext" id="text1" style="width:170px;">
		&nbsp&nbsp<input type="reset" value="重置" class="button2"/>
		&nbsp&nbsp&nbsp <input type="submit" value="提交" class="button2"/>
		<div style="margin-left:140px;">（只限于当前页面的字）</div>
	</form>
	----------------------------------------------------------------------------------------
	<br/>
	<?php
		error_reporting(0);
		require_once("db.php");
		echo '<font style="color:#0000FF">序号&nbsp&nbsp&nbsp&nbsp&nbsp身份证号&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp姓名&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp年龄&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp性别</font><br/>';
		$id=1;
		$query="select * from users1";
		$result=executeQuery($query);
		if(!$result) die(mysql_error());
		while($r=mysql_fetch_row($result)){
			echo '&nbsp'.$id.'&nbsp&nbsp&nbsp&nbsp&nbsp';
			//echo $r[1];
			//显示身份证号
			$query="select answer from $r[1] where formid=1 and questionid=12";
			$result1=executeQuery($query);
			if(!$result) die(mysql_error());
			while($r1=mysql_fetch_row($result1)){
				echo $r1[0].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
				//显示姓名
				$query="select answer from Basic$r1[0] where formid=1 and questionid=1";
				$result2=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r2=mysql_fetch_row($result2)){
					echo $r2[0].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
				}
				//显示年龄
				$query="select answer from Basic$r1[0] where formid=1 and questionid=2";
				$result3=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r3=mysql_fetch_row($result3)){
					echo $r3[0].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
				}
				//显示性别
				$query="select answer from Basic$r1[0] where formid=1 and questionid=3";
				$result4=executeQuery($query);
				if(!$result) die(mysql_error());
				while($r4=mysql_fetch_row($result4)){
					echo $r4[0];
				}
	?>
				<form action="eachResult.php" method="post">
					<input type="hidden" name="ID" value="<?php echo $r1[0];?>"><!--注意此处-->
					<input type="submit" value="查看详细信息" class="viewDetailsButton">
				</form>
				<br/>
	<?php
			}
			$id=$id+1;
		}
	?>
</body>
</html>