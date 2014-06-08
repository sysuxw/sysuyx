<?php # UserCreate.class.php
	require_once('User.class.php');

	class UserCreate extends User {
		function __construct($name, $password, $email, $phone, $address, $gender, $avatar, $remark) {
			$this->_name = mysql_escape_string($name);
			$this->_password = mysql_escape_string($password);
			$this->_email = mysql_escape_string($email);
			$this->_phone = mysql_escape_string($phone);
			$this->_address = mysql_escape_string($address);
			$this->_gender = mysql_escape_string($gender);
			$this->_avatar = mysql_escape_string($avatar);
			$this->_remark = mysql_escape_string($remark);
			$this->_db_connect = MysqlConnect::getInstance();

			$sql = "INSERT INTO User (`name`, `password`, `email`, `phone`, `address`, `gender`, `avatar`, `remark`) VALUES ('$name', '$password', '$email', '$phone', '$address', '$gender', '$avatar', '$remark')";
			$query = mysql_query($sql);
			if (!$query) {
				echo "无法创建新用户：" . mysql_error() . "<br/>";
			}
			else {
				$sql = "SELECT * FROM User WHERE `name` = '$this->_name'";
				$row = mysql_fetch_row(mysql_query($sql));
				$this->_user_id = $row['user_id'];
				//echo "创建成功<br/>";
			}
		}
	}