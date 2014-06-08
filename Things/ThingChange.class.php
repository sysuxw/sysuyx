<?php
include_once('../DbConnect/MysqlConnect.class.php');
include_once('Thing.class.php');
include_once('../Picture/PictureAction.php');

class ThingChange extends Thing
{
	function __construct($value)
	{
	    parent::__construct($value);
	}
	
	public function changeThingMessage($thing_id, $thing_name, $thing_type, $thing_info)
	{
	    if($this->isEmpty())
		    echo 'error in changeThingMessage';
		else
		{
	        $sql = "update Thing set name='$thing_name', type='$thing_type', info='$thing_info' where thing_id='$thing_id'";
		    $result = $this->_mysqlConn->query($sql);
		    return $result;
		}
	}
	
	public function changeThingPicture($thing_pic_id, $thing_pic_name, $thing_pic_type, $thing_pic_size)
	{
	    if($this->isEmpty())
		    echo 'error in changeThingPicture';
		else
		{
			$arr = add_thing_picture($thing_pic_name, $thing_pic_type);
			if($arr[0] != 'error')
			{
				$thing_pic_name = $arr[0];
				$thing_pic_path = $arr[1];
				$thing_pic_type = $arr[2];
				
				$sql = "update ThingPic set name='$thing_pic_name', path='$thing_pic_path', type='$thing_pic_type', size='$thing_pic_size' where thing_id='$thing_pic_id'";
				$pic_result = $this->_mysqlConn->query($sql);
				if($pic_result)
					del_thing_picture($this->getThingPictureName());
					
				return $pic_result;
			}
		}
		return null;
	}
	
	public function addThingRequest()
	{
		if($this->isEmpty())
			echo 'error in addThingRequest';
		$sql = "update Thing set request=request+1 where thing_id='$this->_thingId'";
		$result = $this->_mysqlConn->query($sql);
		
		return $result;
	}
	
	public function recoverDb()
	{
	    $sql = "update Thing set name='$this->_thingName', type='$this->_thingtype', info='$this->_thingInfo' where thing_id='$this->_thingId";
		$result = $this->_mysqlConn->query($sql);
	}
}