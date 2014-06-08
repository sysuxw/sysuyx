<?php
	include_once('../DbConnect/MysqlConnect.class.php');
	$DB = MysqlConnect::getInstance();
	if (isset($_GET['name'])) {
		$name = $_GET['name'];
		$sql = "SELECT * FROM User WHERE `name` = '$name'";
		$result = mysql_query($sql);

		if (is_array(mysql_fetch_row($result))) {
			echo "<p style='color:red;'>用户名已使用</p>";
		} else {
			echo "<p style='color:green;'>用户名可用</p>";
		}
}