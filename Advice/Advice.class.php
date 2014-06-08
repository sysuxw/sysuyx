<?php
include_once('../DbConnect/MysqlConnect.class.php');
class Advice
{
    protected $_adviceId;
	protected $_adviceThingId;
	protected $_adviceAdminId;
	protected $_adviceContent;
	protected $_adviceCreateTime;
	protected $_mysqlConn;
	
	function __construct($thing_id, $admin_id, $user_id)
	{
		$this->_mysqlConn = MysqlConnect::getInstance();
		
		if($thing_id>0 && $admin_id<=0 && $user_id>0)
		{
			$this->_adviceThingId = $thing_id;
			$this->_adviceUserId = $user_id;
			
			$sql = "select * from Advice where thing_id='$this->_adviceThingId' and user_id='$this->_adviceUserId'";
			$check_query = $this->_mysqlConn->query($sql);
			if($result = $this->_mysqlConn->getRow($check_query))
			{
				$this->_adviceId = $result['advice_id'];
				$this->_adviceContent = $result['content'];
				$this->_adviceCreateTime = $result['create_time'];
			}
			else
			{
				$this->_adviceThingId = null;
				$this->_adviceUserId = null;
				$this->_adviceAdminId = null;
				$this->_adviceContent = null;
				$this->_adviceCreateTime = null;
			}
		}
		else if($thing_id>0 && $admin_id>0 && $user_id<=0)
		{
			$this->_adviceThingId = $thing_id;
			$this->_adviceAdminId = $admin_id;
			
			$sql = "select * from Advice where thing_id='$this->_adviceThingId' and admin_id='$this->_adviceAdminId'";
			$check_query = $this->_mysqlConn->query($sql, $this->_mysqlConn->getConn());
			if($result = $this->_mysqlConn->getRow($check_query))
			{
				$this->_adviceId = $result['advice_id'];
				$this->_adviceContent = $result['content'];
				$this->_adviceCreateTime = $result['create_time'];
			}
			else
			{
				$this->_adviceThingId = null;
				$this->_adviceUserId = null;
				$this->_adviceAdminId = null;
				$this->_adviceContent = null;
				$this->_adviceCreateTime = null;
			}
		}
	}
	
	public function isEmpty()
	{
	    if($this->_thingId == null)
		    return true;
		else
		    return false;
	}
	
	public function getAdviceId()
	{ return $this->_adviceId; }
	
	public function getAdviceThingId()
	{ return $this->_adviceThingId; }
	
	public function getAdviceAdminId()
	{ return $this->_adviceAdminId; }
	
	public function getAdviceUserId()
	{ return $this->_adviceUserId; }
	
	public function getAdviceContent()
	{ return $this->_adviceContent; }
	
	public function getAdviceCreateTime()
	{ return $this->_adviceCreateTime; }
}