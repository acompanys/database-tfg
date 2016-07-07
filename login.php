<?php
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	$database = mysqli_connect('127.0.0.1', 'root', '') or die('Could not connect: ' .mysqli_error());
	
	$username = mysqli_real_escape_string($database, $username);
	$password = mysqli_real_escape_string($database, $password);
	
	
	mysqli_select_db($database, 'virtualpc') or die ('Could not select database');
	
	$query = "SELECT * FROM users WHERE username='" .$username. "'AND password='" .$password. "'";
	$result = mysqli_query($database, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if (mysqli_num_rows($result)>0)
	{
		echo $row['user_id'] . "|" . ucfirst($row['username']);
	}
	else
	{
		echo "error";
	}
?>