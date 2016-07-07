<?php
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	
	$database = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' .mysqli_error($database));

	$username = mysqli_real_escape_string($database,$username);
	$password = mysqli_real_escape_string($database,$password);
	
	mysqli_select_db($database, 'virtualpc') or die ('Could not select database');
	
	$query = "INSERT INTO users (username, password, date) VALUES ('$username', '$password', DATE(NOW()));";

	$result = mysqli_query($database, $query) or die('Query failed: ' . mysqli_error($database));

	echo "registered";
?>