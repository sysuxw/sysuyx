<?php # Admin.class.php
	require_once(dirname(__FILE__).'/../global.php');
	require_once('DbConnect/MysqlConnect.class.php');

	class Admin {
		private $__admin_id;
		private $__name;
		private $__password;
		private $__remark;
		private $__db_connect;

		function __construct($name) {
			$__db_connect = MysqlConnect::getInstance();
			$sql = "SELECT * FROM User WHERE `name` = '$name'";
			$query = mysql_query($sql);
			$arr = is_array($row = mysql_fetch_array($query));
			if (!$arr) {
				die("无该管理员");
			} else {
				$__admin_id = $row['admin_id'];
				$__name = $row['name'];
				$__password = $row['password'];
				$__remark = $row['remark'];
			}
		}

		public function getAdminAdmin_id() {
			return $__admin_id;
		}
		public function getAdminName() {
			return $__name;
		}
		public function getAdminPassword() {
			return $__password;
		}
		public function getAdminRemark() {
			return $__remark;
		}

	}