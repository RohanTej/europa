<?php
include "../connect.php";
session_start();

$name = $_POST['name'];
$loc = $_POST['loc'];
$uid = $_SESSION['uid'];

$name = stripslashes($name);
$loc = stripslashes($loc);

$t=time();
$t = md5($t);

$sql = "INSERT INTO `event_data` SET `user_id`='$uid', `event_id`='$t',`name`='$name', `location`='$loc'";
$sql_2 = "INSERT INTO `event_info` SET `user_id`='$uid', `event_id`='$t', `event_name`='$name',`coming`='0', `maybe`='0'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_query($conn, $sql_2))
        echo '1';
} else echo (mysqli_error($conn));

?>