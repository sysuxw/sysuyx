<?php
include_once('../DbConnect/MysqlConnect.class.php');
include_once('Thing.class.php');
include_once('../Picture/PictureAction.php');

class ThingRemove extends Thing
{	
	function __construct($thing_id)
	{
	    parent::__construct($thing_id);
	}
	
	public function removeThingMessage($thing_id)
	{
	    if($this->isEmpty())
		    return true;
		else
		{		
			$sql = "delete from Thing where thing_id='$thing_id'";
			
			$result = $this->_mysqlConn->query($sql);
			
			if($result)
			{
				return true;
			}
			else
			{
			    echo 'error in removeThingMessage';
				return false;
			}
		}
	}
	
	public function removeThingPicture($thing_pic_name, $thing_pic_type)
	{
	    if($this->isEmpty())
		    return true;
	    else
		{
			$sql = "delete from ThingPic where name='$thing_pic_name'";
			$result = $this->_mysqlConn->query($sql);
			
			if($result)
			{
				del_thing_picture($thing_pic_name, $thing_pic_type);
			    return true;
			}
			else
			{
			    echo 'error in removeThigPicture';
				return false;
			}
		}
	}
	
	public function recoverDb()
	{
	    $sql = "insert into Thing (thing_id, name, type, request, info, user_id)
		        values ('$this->_thingId', '$this->_thingName', '$this->_thingType', '$this->_thingRequest', '$this->_thingInfo', '$this->_thingUserId')";
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