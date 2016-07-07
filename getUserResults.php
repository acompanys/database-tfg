<?php
	$user_id = $_REQUEST['user_id'];
	$level_id = $_REQUEST['level_id'];
	
	$user_id = (int)$user_id;
	$level_id = (int)$level_id;
	
	$database = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' .mysqli_error($database));

	mysqli_select_db($database, 'virtualpc') or die ('Could not select database');

	$query = "SELECT * FROM results WHERE user_id='" .$user_id. "'AND level_id='" .$level_id. "'";
	$result = mysqli_query($database, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if (mysqli_num_rows($result)>0)
	{
		echo $row['score'] . "|" . $row['time'];
	}
	else
	{
		echo "error";
	}
?>