<?php
include_once('ThingChange.class.php');

if(!empty($_POST['thing_id']))
{
	$thing_id = $_POST['thing_id'];
	$thing_change = new ThingChange($thing_id);
	if( $thing_change->addThingRequest() )
		echo 'ok';
	else
		echo 'failed';
}