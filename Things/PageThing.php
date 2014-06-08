<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<?php
include_once('Things.class.php');

$user_id = 1;

$thing_query = new Things();

if( $thing_query->getAllThings() )
{
	while($thing_query->getThingsNext())
		echo $thing_query->getThingName();
		echo $thing_query->getThingPictureName();
}
?>
</head>
</html>