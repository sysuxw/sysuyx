<?php
include_once('Advice.class.php');

class AdviceCreate extends Advice
{
	
	function __construct($thing_id, $admin_id, $user_id)
	{
		parent::__construct($thing_id, $admin_id, $user_id);
	}
	
	public function createadvice($thing_id, $admin_id, $user_id, $content, $create_time)
	{
		if( $this->isEmpty() )
		{
			$this->_adviceThingId = $thing_id;
			$this->_adviceAdminId = $admin_id;
			$this->_adviceUserId = $user_id;
			$this->_adviceContent = $content;
			$this->_adviceCreateTime = $create_time;
			
			$sql = "insert into Advice (thing_id, admin_id, user_id, content, create_time)
					values ('$this->_adviceThingId', '$this->_adviceAdminId', '$this->_adviceUserId', '$this->_adviceContent', '$this->_adviceCreateTime')";
			
			$result = $this->_mysqlConn->query($sql);
			
			if($result)
			{
				$this->_adviceId = mysql_insert_id();
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
	    $sql = "delete from Advice where advice_id='$this->_adviceId'";
		$result = $this->_mysqlConn->query($sql);
		if($result)
		    return true;
		else
			return false;
	}
}