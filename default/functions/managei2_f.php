<?php
    include "../connect.php";
    session_start();
    
    $uid = $_SESSION['uid'];
    $id = $_POST['e_id'];
    
    
    $sql = "SELECT * FROM `event_info` WHERE `user_id`='$uid' AND `event_id`='$id'";
    $result= mysqli_query($conn, $sql);
    $row= mysqli_fetch_assoc($result);
    
    $url = $_SERVER['HTTP_HOST'] . "/website/register?id=" . $row['event_id'];

    echo $row['coming'].",".$row['maybe'].",".$url;
?>