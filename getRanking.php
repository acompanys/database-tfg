<?php
	$level_id = $_REQUEST['level_id'];
	$num_ranks = $_REQUEST['num_ranks'];
	
	$level_id = (int)$level_id;
	$num_ranks = (int)$num_ranks;
	
	$database = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' .mysqli_error($database));

	mysqli_select_db($database,'virtualpc') or die ('Could not select database');

	$query = "SELECT * FROM results INNER JOIN users ON results.user_id = users.user_id WHERE results.level_id='" .$level_id. "' ORDER BY score DESC, time ASC LIMIT $num_ranks";
	
	$result = mysqli_query($database, $query) or die ('Query failed: ' .mysql_error($database));
	$num_results = mysqli_num_rows($result);
	
	for($i = 0; $i < $num_results; $i++)
	{
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo ucfirst($row['username']) . "|" . $row['score'] . "|" . $row['time'] . "\n";
	}
?>