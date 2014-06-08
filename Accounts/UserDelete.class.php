<?php # UserDelete.class.php
	require_once('User.class.php');

	class UserDelete extends User {
		function __construct($name) {
			$_db_connect = MysqlConnect::getInstance();
			$name = mysql_escape_string($name);
			$sql = "DELETE FROM User WHERE `name` = '$name'";
			$query = mysql_query($sql);
			if (!$query) {
				echo '删除用户失败:' . mysql_errno();
			} else {
				//echo "删除用户成功";
			}
		}	
	}