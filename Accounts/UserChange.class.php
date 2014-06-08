<?php # UserChange.class.php
	require_once('UserQuery.class.php');

	/**
	* 修改用户信息，而且可以查看密码
	*/
	class UserChange extends UserQuery {
		
		public function getUserPassword(){ //重写的getUserPSW方法。
			return $this->_password;
		}
		public function setUserName($name) {
	        $this->changeValue('name', $name);
	        $this->_name = $name;
		}
		public function setUserPassword($password){
	        $this->changeValue('password', $password);
	       	$this->_password = $password;
		}
		public function setUserEmail($email) {
	        $this->changeValue('email', $email);
	        $this->_email = $email;
		}
		public function setUserPhone($phone) {
	        $this->changeValue('phone', $phone);
	        $this->_phone = $phone;
		}
		public function setUserAddress($address) {
	        $this->changeValue('address', $address);
	        $this->_address = $address;
		}
		public function setUserGender($gender) {
	        $this->changeValue('gender', $gender);
	        $this->_gender = $gender;
		}
		public function setUserAvatar($avatar) {
	        $this->changeValue('avatar', $avatar);
	        $this->_avatar = $avatar;
		}
		public function setUserRemark($remark) {
	        $this->changeValue('remark', $remark);
	        $this->_remark = $remark;
		}

		private function changeValue($target, $value) {
			if ($value == '') {
				echo "修改值不能为空";
				return;
			}
			$value = mysql_escape_string($value); // 过滤特殊字符,把 SQL 语句里面的 ' 转义为 \'
	        $name = mysql_escape_string($this->_name);
	        $sql = "UPDATE User SET `$target` = '$value' WHERE `name` = '$name'";
			$query = mysql_query($sql);
			if (!$query) {
				echo "修改失败：" . mysql_error() . "<br/>";
			} else {
				//echo "修改成功<br/>";
			}
		}

	}