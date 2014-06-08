<?php
include_once('../DbConnect/MysqlConnect.class.php');
include_once('Thing.class.php');
include_once('../Picture/PictureAction.php');

class ThingCreate extends Thing
{
	function __construct()
	{
	    $this->_mysqlConn = MysqlConnect::getInstance();
	}
	
	public function createThingMessage($thing_name, $thing_type, $thing_info, $thing_user_id)
	{
		$this->_thingName = $thing_name;
		$this->_thingType = $thing_type;
		$this->_thingInfo = $thing_info;
		$this->_thingUserId = $thing_user_id;
		$this->_thingRequest = 0;
		
		$sql = "insert into Thing (name, type, request, info, user_id)
				values ('$this->_thingName', '$this->_thingType', '$this->_thingRequest', '$this->_thingInfo', '$this->_thingUserId')";
		
		$result = $this->_mysqlConn->query($sql);
		
		if($result)
		{
			$this->_thingId = mysql_insert_id();
			return true;
		}
		else
		{
		    echo 'error in createThingMessage';
		    return false;
		}
	}
	
	public function createThingPicture($thing_pic_id, $thing_pic_name, $thing_pic_type, $thing_pic_size)
	{

		$this->_thingPictureId = $thing_pic_id;
		$this->_thingPictureSize = $thing_pic_size;
		
		$arr = add_thing_picture($thing_pic_name, $thing_pic_type);
		if($arr[0] != 'error')
		{
			$this->_thingPictureName = $arr[0];
			$this->_thingPicturePath = $arr[1];
			$this->_thingPictureType = $arr[2];
		}
		$sql = "insert into ThingPic (name, type, path, size, thing_id)
		        values ('$this->_thingPictureName', '$this->_thingPictureType', '$this->_thingPicturePath', '$this->_thingPictureSize', '$this->_thingPictureId')";
		$result = $this->_mysqlConn->query($sql);
		
		if($result)
			return true;
		else
		{
		    echo 'error in createThingPicture';
			return false;
		}
	}
	
	public function recoverDb()
	{
	    $sql = "delete from Thing where thing_id='$this->_thingId'";
		$result = $this->_mysqlConn->query($sql);
		if($result)
		    return true;
		else
		{
		    echo 'error in recoverDb';
			return false;
		}
	}
}