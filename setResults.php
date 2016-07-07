<?php
	$user_id = $_REQUEST['user_id'];
	$score = $_REQUEST['score'];
	$time = $_REQUEST['time'];
	$level_id = $_REQUEST['level_id'];

	$user_id = (int)$user_id;
	$score = (int)$score;
	$time = (float)$time;
	$level_id = (int)$level_id;

	$database = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' .mysqli_error($database));

	mysqli_select_db($database, 'virtualpc') or die ('Could not select database');

	$query = "SELECT score, time FROM results WHERE user_id='" .$user_id. "' AND level_id='" .$level_id. "'";
	$result = mysqli_query($database, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ( mysqli_num_rows($result)<1 ){
		mysqli_query($database, "INSERT INTO results (user_id, score, time, level_id) VALUES ( '$user_id', '$score', '$time', '$level_id' );");
		echo "updated";
	} else {
		$saved_score = $row['score'];
		$saved_time = $row['time'];
		if ( $score > $saved_score || ( $saved_score == $score && $time < $saved_time )) {
			mysqli_query($database, "UPDATE results SET score='" .$score. "', time='" .$time. "' WHERE user_id=" .$user_id. " AND level_id=" . $level_id ."");
			echo "updated";
		}
	}
?>