<?php
	function add_user_picture($picture_name, $picture_type)    
	{
		if( !empty( $picture_name ))
		{	
			$tp = array("image/gif","image/pjpeg","image/jpeg","image/png");
			if( !in_array($picture_type,$tp) )
			{
				echo "<script language='javascript'>alert('图片格式不对');history.back();</script>";
				exit;
			}
			$filetype = $picture_type;
			if($filetype == 'image/jpeg')
			{ 
				$type = '.jpg'; 
			} 
			if ($filetype == 'image/jpg') 
			{ 
				$type = '.jpg'; 
			} 
			if ($filetype == 'image/pjpeg') 
			{ 
				$type = '.jpg'; 
			} 
			if($filetype == 'image/gif')
			{ 
				$type = '.gif'; 
			}
			if($filetype == 'image/png')
			{ 
				$type = '.png'; 
			}
			$nowtime = date("YmdHis");
			$path = 'userpicture';
			$name = $nowtime.$type;
			
			$storePic = new SaeStorage();
			$result = $storePic->upload($path, $name, $_FILES["picture"]["tmp_name"]);
		}
			
		if( $result )
		{
			return array($name,$path,$type);
		}
		else
		{
			echo SaeStorage::errmsg();
			return array("error");
		}
	}
	
	function del_user_picture($picture_name)
	{
		$storePic = new SaeStorage();
		$path = 'userpicture';
		if( $storePic->fileExists($path, $picture_name) )
		{
			if( $storePic->delete($path, $picture_name) )
				return true;
			else
				echo SaeStorage::errmsg();
		}
		return true;
	}
	
	function add_thing_picture($picture_name, $picture_type)    
	{
		if(!empty( $picture_name ))
		{	
			$tp = array("image/gif","image/pjpeg","image/jpeg","image/png");
			if(!in_array($picture_type,$tp))
			{
				echo "<script language='javascript'>alert('图片格式不对');history.back();</script>";
				exit;
			}
			$filetype = $picture_type;
			if($filetype == 'image/jpeg')
			{ 
				$type = '.jpg'; 
			} 
			if ($filetype == 'image/jpg') 
			{ 
				$type = '.jpg'; 
			} 
			if ($filetype == 'image/pjpeg') 
			{ 
				$type = '.jpg'; 
			} 
			if($filetype == 'image/gif')
			{ 
				$type = '.gif'; 
			}
			if($filetype == 'image/png')
			{ 
				$type = '.png'; 
			}
			$nowtime = date("YmdHis");
			$path = 'things';
			$name = $nowtime.$type;
			
			$storePic = new SaeStorage();
			$result = $storePic->upload($path, $name, $_FILES["picture"]["tmp_name"]);
		}
			
		if( $result )
		{
			return array($name,$path,$type);
		}
		else
		{
			echo SaeStorage::errmsg();
			return array("error");
		}
	}
	
	function del_thing_picture($picture_name)
	{
		$storePic = new SaeStorage();
		$path = 'things';
		if( $storePic->fileExists($path, $picture_name) )
		{
			if( $storePic->delete($path, $picture_name) )
				return true;
			else
				echo SaeStorage::errmsg();
		}
		return true;
	}