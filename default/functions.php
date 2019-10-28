<?php 
include "connect.php";
session_start();

//functions

function check_event($uid) {
	include "connect.php";
	$sql = "SELECT * FROM `event_data` WHERE `user_id`='$uid'";
  
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
  
	return $count;
  }

?>