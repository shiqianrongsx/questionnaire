<?php
	class dbHelper{
		private $mysqli;
		private static $server="localhost";
		private static $username="question";
		private static $password="questionadmin";
		private static $dbname="questionnaire";
		function __construct(){
			$this->mysqli=new MYSQLi(self::$server,self::$username,self::$password,self::$dbname);
			if($this->mysqli->connect_error){
				die("连接失败".$this->mysql->connect_error);
			}
			$this->mysqli->query("set names utf8");
		}
		//查找select
		public function executedql($sql){
			$result=$this->mysqli->query($sql) or die("查询失败".$this->mysqli->error);;
			return $result;
		}
		//增删改
		public function executedml($sql){
			$result=$this->mysqli->query($sql);
			if(!$result){
				die("操作失败".$this->mysqli->error);
			}elseif($this->mysqli->affected_rows>0){
				die("操作成功");
			}elseif($this->mysqli->affected_rows==0){
				die("没有影响行数");
			}
		}
	}
?>