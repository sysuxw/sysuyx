<?php
	if (!isset($_SESSION['name'])) {
		echo "<script>window.location= 'http://sysuyx.sinaapp.com/Main/PageMain.php';</script>";
	} else {
		$_SESSION = array();
		session_destroy();
		setcookie(session_name(), '', time()-300, '/', '', 0);
		echo "登出成功！&nbsp;";
		echo "<a href='../Main/PageMain.php'>主页</a>";
	}