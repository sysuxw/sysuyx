<?php # UserQuery.class.php
	require_once('User.class.php');

	/**
	* 查询 User 的信息
	* 但不能获取密码，
	*/
	class UserQuery extends User {

		function __construct($name) {
		$_db_connect = MysqlConnect::getInstance();
			$name = mysql_escape_string($name);
			$sql = "SELECT * FROM User WHERE `name` = '$name'";
			$query = mysql_query($sql);
			$row_num = mysql_num_rows($query);
			if ($row_num == 0) {
				echo "不存在该用户<br/>";
			} else {
				$row = mysql_fetch_array($query);
				$this->_user_id = $row['user_id'];
				$this->_name = $row['name'];
				$this->_password = $row['password'];
				$this->_email = $row['email'];
				$this->_phone = $row['phone'];
				$this->_address = $row['address'];
				$this->_gender = $row['gender'];
				$this->_avatar = $row['avatar'];
				$this->_remark = $row['remark'];
			}
		}		

		public function getUserUser_id() {
			return $this->_user_id;
		}
		public function getUserUserId() {
			return $this->_user_id;
		}
		public function getUserName() {
			return $this->_name;
		}
		/* 不能获取密码
		public getUserPassword() {
			return $this->password;
		}
		*/
		public function getUserEmail() {
			return $this->_email;
		}
		public function getUserPhone() {
			return $this->_phone;
		}
		public function getUserAddress() {
			return $this->_address;
		}
		public function getUserGender() {
			if ($this->_gender == 0)
				return '女';
			else
				return '男';
		}
		public function getUserAvatar() {
			return $this->_avatar;
		}
		public function getUserRemark() {
			return $this->_remark;
		}
	}