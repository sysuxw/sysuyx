<?php
include_once('Thing.class.php');

class Things extends Thing
{
    protected $_things;
	protected $_count;
	
	function __construct()
	{
		$this->_count = 0;
		$this->_things = array();
		$this->_mysqlConn = MysqlConnect::getInstance();
	}
	
	private function __result($sql)
	{
		$result = $this->_mysqlConn->query($sql);
		$this->_things = $this->_mysqlConn->getRows($result);
		
		if($this->_things)
			return true;
		else
			return false;
	}
	
	public function getAllThings()
	{
		$sql = "select * from Thing";
		return $this->__result($sql);
	}
	
	public function getThingsBySearch($search_value)
	{
		$sql = "select * from Thing where name || info like '%$search_value%'";
		return $this->__result($sql);
	}
	
	public function getThingsByUserId($user_id)
	{
		$sql = "select * from Thing where user_id='$user_id'";
		return $this->__result($sql);
	}
	
	public function getThingsByType($type)
	{
		$sql = "select * from Thing where type='$type'";
		return $this->__result($sql);
	}
	
	public function getThingsNext()
	{
	    if($this->_things[$this->_count] == null)
		{
			$this->_count = 0;
			return false;
		}
		else
		{
			$this->_thingId = $this->_things[$this->_count]['thing_id'];
			$this->_thingName = $this->_things[$this->_count]['name'];
			$this->_thingType = $this->_things[$this->_count]['type'];
			$this->_thingInfo = $this->_things[$this->_count]['info'];
			$this->_thingRequest = $this->_things[$this->_count]['request'];
			$this->_thingUserId = $this->_things[$this->_count]['user_id'];
			
			$pic_check_query = $this->_mysqlConn->query("select * from ThingPic where thing_id='$this->_thingId' order by id limit 1");
			if($pic_result = $this->_mysqlConn->getRow($pic_check_query))
			{
				$this->_thingPictureId = $pic_result['thing_id'];
				$this->_thingPictureName = $pic_result['name'];
				$this->_thingPicturePath = $pic_result['path'];
				$this->_thingPictureType = $pic_result['type'];
				$this->_thingPictureSize = $pic_result['size'];
			}
			else
			{
				echo 'error in pic_result';
			}
			$this->_count++;
			return true;
		}
	}
}