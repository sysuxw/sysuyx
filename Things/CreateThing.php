<?php
session_start();
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	
	include_once('ThingCreate.class.php');
	$picture_size = $_FILES['picture']['size'];
	$max_size = $_POST['max_picture_size'];
	
	$picture_name = $_FILES['picture']['name'];             //图片不能为空
	if( $picture_name == "" )
	{
		echo "<script language='javascript'>alert('图片不能为空');history.back();</script>";
		exit;
	}
	$max_size = $_POST['max_picture_size'];
	
	if( $picture_size > $max_size )
	{
		echo "<script language='javascript'>alert('图片太大了！最大限制为2M');history.back();</script>";
		exit;
	}
	
	$user_id = $_SESSION['id'];
	
	$picture_type = $_FILES["picture"]["type"];
	$picture_size = $_FILES["picture"]["size"];
	
	$thing_name = $_POST['name'];
	$thing_type = $_POST['type'];
	$thing_info = $_POST['info'];
	
	$thing_create = new ThingCreate();
	
	if( $thing_create->createThingMessage($thing_name, $thing_type, $thing_info, $user_id) )
	{
	    if( $thing_create->createThingPicture($thing_create->getThingId(), $picture_name, $picture_type, $picture_size) )
		{
			echo "<script language='javascript'>alert('创建成功！现在返回首页');window.location.href='../Main/PageMain.php'; </script>";
		}
		else
		{
		    $thing_create->recoverDb();
			echo "<script language='javascript'>alert('抱歉，创建失败！');history.back();</script>";
		}
	}