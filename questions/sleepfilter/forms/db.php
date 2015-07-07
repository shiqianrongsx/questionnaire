<?php
include_once 'dbsettings.php';//在脚本执行期间包含并运行指定文件
$conn=false;
function executeQuery($query)
{
    global $conn,$dbserver,$dbname,$dbpassword,$dbusername;
    global $message;
    if (!($conn=@mysql_connect($dbserver,$dbusername,$dbpassword)))//@的意思是忽略错误，也就是说这个函数执行过程中发生错误不会报错。
         $message="Cannot connect to server";
    if (!@mysql_select_db ($dbname, $conn))
         $message="Cannot select database";
	mysql_query('set names utf8;');
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
    $result=mysql_query($query,$conn);
    if(!$result)
        $message="Error while executing query.<br/>Mysql Error: ".mysql_error();
    else
        return $result;
}
function closedb()
{
    global $conn;
    if($conn){
    mysql_close($conn);
	}
}
?>
