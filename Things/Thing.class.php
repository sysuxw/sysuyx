<?php
include_once('../DbConnect/MysqlConnect.class.php');

class Thing
{
    protected $_thingId;
    protected $_thingName;
    protected $_thingType;
	protected $_thingRequest;
    protected $_thingInfo;
	protected $_thingUserId;
    protected $_thingPictureId;
	protected $_thingPictureName;
	protected $_thingPicturePath;
	protected $_thingPictureType;
	protected $_thingPictureSize;
	protected $_mysqlConn;
	
   function __construct($value)
	{
	    $this->_mysqlConn = MysqlConnect::getInstance();
		$this->_thingId = $value;
		$check_query = $this->_mysqlConn->query("select * from Thing where thing_id='$this->_thingId'");
		if($result = $this->_mysqlConn->getRow($check_query))
		{
			$this->_thingName = $result['name'];
			$this->_thingType = $result['type'];
			$this->_thingInfo = $result['info'];
			$this->_thingRequest = $result['request'];
			$this->_thingUserId = $result['user_id'];
			$pic_check_query = $this->_mysqlConn->query("select * from ThingPic where thing_id='$this->_thingId'");
			if($pic_result = $this->_mysqlConn->getRow($pic_check_query))
			{
				$this->_thingPictureId = $pic_result['thing_id'];
				$this->_thingPictureName = $pic_result['name'];
				$this->_thingPicturePath = $pic_result['path'];
				$this->_thingPictureType = $pic_result['type'];
				$this->_thingPictureSize = $pic_result['size'];
			}
		}
		else
		{
		    $this->_thingId = null;
			$this->_thingName = null;
			$this->_thingType = null;
			$this->_thingInfo = null;
			$this->_thingPictureId = null;
			$this->_thingPictureName = null;
			$this->_thingPicturePath = null;
			$this->_thingPictureType = null;
			$this->_thingPictureSize = null;
		}
	}
	
	public function isEmpty()
	{
	    if($this->_thingId || $this->_thingName)
		    return false;
		else
		    return true;
	}
	
	public function getThingId()
	{ return $this->_thingId; }

	public function getThingName()
	{ return $this->_thingName; }
	
	public function getThingType()
	{ return $this->_thingType; }
	
	public function getThingRequest()
	{ return $this->_thingRequest; }
	
	public function getThingInfo()
	{ return $this->_thingInfo; }
	
	public function getThingUserId()
	{ return $this->_thingUserId; }
	
	public function getThingPictureId()
	{ return $this->_thingPictureId; }
	
	public function getThingPictureName()
	{ return $this->_thingPictureName; }

	public function getThingPicturePath()
	{ return $this->_thingPicturePath; }
	
	public function getThingPictureType()
	{ return $this->_thingPictureType; }
	
	public function getThingPictureSize()
	{ return $this->_thingPictureSize; }
}