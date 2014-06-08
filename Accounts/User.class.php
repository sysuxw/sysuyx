<?php # User.class.php
	require_once('../DbConnect/MysqlConnect.class.php');
	
	class User {
		protected $_user_id;
		protected $_name;
		protected $_password;
		protected $_email;
		protected $_phone;
		protected $_address;
		protected $_gender;
		protected $_avatar;
		protected $_remark;
		protected $_db_connect;

		function __construct() {
			$this->_db_connect = null;

			$this->_user_id = null;
			$this->_name = null;
			$this->_password = null;
			$this->_email = null;
			$this->_phone = null;
			$this->_address = null;
			$this->_gender = null;
			$this->_avatar = null;
			$this->_remark = null;
		}
	}