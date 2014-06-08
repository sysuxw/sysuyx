<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	$thing_id = $_POST['thing_id'];
	$thing_name = $_POST['name'];
	$thing_type = $_POST['type'];
	$thing_info = $_POST['info'];

	include_once('ThingChange.class.php');
	$picture_size = $_FILES["picture"]["size"];
	$max_size = $_POST['max_picture_size'];
	
	$picture_name = $_FILES["picture"]["name"];
	$max_size = $_POST['max_picture_size'];
	
	if( $picture_size > $max_size )
	{
		echo ("<script language='javascript'>alert('图片太大了！最大限制为2M');history.back();</script>");
		exit;
	}
	
	$picture_type = $_FILES["picture"]["type"];
	$picture_size = $_FILES["picture"]["size"];
	
	$thing_change = new ThingChange($thing_id);
	
	if( $thing_change->changeThingMessage($thing_id, $thing_name, $thing_type, $thing_info) )
	{
		if($picture_name != "")
		{
			if($thing_change->changeThingPicture($thing_id, $picture_name, $picture_type, $picture_size))
			{
				echo "<script language='javascript'>alert('更新成功！现在返回首页');window.location.href='../Main/PageMain.php'; </script>";
			}
			else
			{
				$thing_change->recoverDb();
				echo "<script language='javascript'>alert('抱歉，更新失败！');history.back();</script>";
			}
		}
		else
			echo "<script language='javascript'>alert('更新成功！现在返回首页');window.location.href='../Main/PageMain.php'; </script>";
	}