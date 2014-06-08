<?php
include_once('../DbConnect/MysqlConnect.class.php');
class Message
{
    protected $_messageId;
	protected $_messageThingId;
	protected $_messageAdminId;
	protected $_messageContent;
	protected $_messageCreateTime;
	protected $_mysqlConn;
	
	function __construct($thing_id, $admin_id, $user_id)
	{
		$this->_mysqlConn = MysqlConnect::getInstance();
		
		if($thing_id>0 && $admin_id<=0 && $user_id>0)
		{
			$this->_messageThingId = $thing_id;
			$this->_messageUserId = $user_id;
			
			$sql = "select * from Message where thing_id='$this->_messageThingId' and user_id='$this->_messageUserId'";
			$check_query = $this->_mysqlConn->query($sql);
			if($result = $this->_mysqlConn->getRow($check_query))
			{
				$this->_messageId = $result['message_id'];
				$this->_messageContent = $result['content'];
				$this->_messageCreateTime = $result['create_time'];
			}
			else
			{
				$this->_messageThingId = null;
				$this->_messageUserId = null;
				$this->_messageAdminId = null;
				$this->_messageContent = null;
				$this->_messageCreateTime = null;
			}
		}
		else if($thing_id>0 && $admin_id>0 && $user_id<=0)
		{
			$this->_messageThingId = $thing_id;
			$this->_messageAdminId = $admin_id;
			
			$sql = "select * from Message where thing_id='$this->_messageThingId' and admin_id='$this->_messageAdminId'";
			$check_query = $this->_mysqlConn->query($sql, $this->_mysqlConn->getConn());
			if($result = $this->_mysqlConn->getRow($check_query))
			{
				$this->_messageId = $result['message_id'];
				$this->_messageContent = $result['content'];
				$this->_messageCreateTime = $result['create_time'];
			}
			else
			{
				$this->_messageThingId = null;
				$this->_messageUserId = null;
				$this->_messageAdminId = null;
				$this->_messageContent = null;
				$this->_messageCreateTime = null;
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
	
	public function getMessageId()
	{ return $this->_messageId; }
	
	public function getMessageThingId()
	{ return $this->_messageThingId; }
	
	public function getMessageAdminId()
	{ return $this->_messageAdminId; }
	
	public function getMessageUserId()
	{ return $this->_messageUserId; }
	
	public function getMessageContent()
	{ return $this->_messageContent; }
	
	public function getMessageCreateTime()
	{ return $this->_messageCreateTime; }
}