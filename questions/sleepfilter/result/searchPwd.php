<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>输入密码</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<style type="text/css">
	.wrap span{font-size:30px;color:white;font-family:华文行楷,华文新魏;}
	#content{position:relative;}
	.wrap{position:absolute;left:180px;top:180px;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle" style="height:500px;">
		<div id="content">
			<div class="wrap">
				<form action="" method="post">
					<span>请输入查询密码</span>
					<input type="password" name="pwd"><br/>
					<input class="button2" type="reset" value="重置" style="position:absolute;left:90px;top:80px;"><input class="button2" type="submit" value="提交" name="submitform" style="position:absolute;left:210px;top:80px;">
				</form>
				<?php
					error_reporting(0);
					$pwd = "sleepqnt"; 
					if(isset($_REQUEST['submitform'])){
						if($_REQUEST[pwd]){
							if ($pwd==$_REQUEST[pwd])
							{
								header('Location:list.php');
							}else{
								echo '<font style="color:red;float:right;">密码输入有误,请重新输入</font>';
							}
						}else{echo '<font style="color:red;float:right;">密码为空,请输入密码</font>';}
					}
				?>
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

