<?php
	include_once('../DbConnect/MysqlConnect.class.php');
	$DB = MysqlConnect::getInstance();
	if (isset($_GET['email'])) {
		$email = $_GET['email'];
		$sql = "SELECT * FROM User WHERE `email` = '$email'";
		$result = mysql_query($sql);

		if (is_array(mysql_fetch_row($result))) {
			echo "<p style='color:red;'>邮箱已使用</p>";
		} else {
			echo "<p style='color:green;'>邮箱可用</p>";
		}
	}