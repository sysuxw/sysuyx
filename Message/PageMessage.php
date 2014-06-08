<html>
<?php
include_once('Message.class.php');
$message = new Message(1, -1, 1);
echo $message->getMessageContent();
?>
<form name="message" method="post" action="CreateMessage.php">
<td height="150" colspan="3" align="left" valign="middle"><table width="1048" height="137" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <th width="899" rowspan="2" bgcolor="#F0F0F0" scope="col"><textarea name="content"></textarea></th>
  </tr>
  	  <tr>
		<th bgcolor="#F0F0F0" scope="row"><input name="submit" type="submit" value="ÆÀÂÛ" /></th>
		</tr>
</td>
</form>
</html>