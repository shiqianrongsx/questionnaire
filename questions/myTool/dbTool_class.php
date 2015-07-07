<?php
	class dbTool{
		private $conn;
		private $server="localhost";
		Private $username="question";
		private $password="questionadmin";
		private $dbname="questionnaire";
		function __construct(){
			$this->conn=mysql_connect($this->server,$this->username,$this->password);
			if(!$this->conn){die('服务器连接失败'.mysql_error());}
			mysql_select_db($this->dbname,$this->conn);
			mysql_query("set names utf8");
		}
		//增删改操作 update delete insert
		function execute_dml($sql){
			$result=mysql_query($sql); 
			if(!$result){
				die('操作失败');
			}elseif(mysql_affected_rows($this->conn)>0){
				die('删除成功');
			}elseif(mysql_affected_rows($this->conn)==0){
				die('没有影响行数');
			}
		}
		//查 select
		function execute_dql($sql){
			$result=mysql_query($sql,$this->conn)or die('操作失败1'.mysql_error());
			return $result;
		}
	}
?>