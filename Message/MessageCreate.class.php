<?php
include_once('Message.class.php');

class MessageCreate extends Message
{
	
	function __construct($thing_id, $admin_id, $user_id)
	{
		parent::__construct($thing_id, $admin_id, $user_id);
	}
	
	public function createMessage($thing_id, $admin_id, $user_id, $content, $create_time)
	{
		if( $this->isEmpty() )
		{
			$this->_messageThingId = $thing_id;
			$this->_messageAdminId = $admin_id;
			$this->_messageUserId = $user_id;
			$this->_messageContent = $content;
			$this->_messageCreateTime = $create_time;
			
			$sql = "insert into Message (thing_id, admin_id, user_id, content, create_time)
					values ('$this->_messageThingId', '$this->_messageAdminId', '$this->_messageUserId', '$this->_messageContent', '$this->_messageCreateTime')";
			
			$result = $this->_mysqlConn->query($sql);
			
			if($result)
			{
				$this->_messageId = mysql_insert_id();
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	
	public function recoverDb()
	{
	    $sql = "delete from Message where message_id='$this->_messageId'";
		$result = $this->_mysqlConn->query($sql);
		if($result)
		    return true;
		else
			return false;
	}
}