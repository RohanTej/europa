<?php
include "../connect.php";
session_start();

$uid = $_SESSION['uid'];

$id = $_POST['uid'];

$sql_fetch = "SELECT * FROM `event_data` WHERE `user_id`='$uid' AND `id`='$id'";
$result_fetch = mysqli_query($conn, $sql_fetch);
$row_fetch = mysqli_fetch_assoc($result_fetch);
$event_id = $row_fetch['event_id'];

$sql = "DELETE FROM `event_data` WHERE `user_id`='$uid' AND `id`='$id'";
$sql_2 = "DELETE FROM `event_info` WHERE `user_id`='$uid' AND `event_id`='$event_id'";

if ($result = mysqli_query($conn, $sql)) {
    if ($result = mysqli_query($conn, $sql_2)) 
        echo '1'; else echo (mysqli_error($conn));
} else echo (mysqli_error($conn));

?>