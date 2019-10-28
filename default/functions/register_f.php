<?php
include "../connect.php";
session_start();

$id = $_POST['id'];

if($_POST['check']) {
    $sql = "SELECT * FROM `event_info` WHERE `event_id`='" . $id . "'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        
        $event_name = $row['event_name'];

        $sql2 = "SELECT * FROM `event_data` WHERE `event_id`='" . $id . "'";

        $result2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($result2);

        if ($count2 == 1) {
            $data = mysqli_fetch_assoc($result2);

            $name = $data['location'];
            
            
            echo $event_name . "," . $name;
        } else {
            echo 'error';
        }

    } else {
        echo 'error';
    }
} else {
    $sql = "SELECT * FROM `event_info` WHERE `event_id`='" . $id . "'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        
        $c = $row['coming'];    
        $m = $row['maybe'];
    }

    if ($_POST['v'] == '0') {
        $c++;
    } else $m++;

    $sql2 = "UPDATE `event_info` SET `coming`='$c', `maybe`='$m' WHERE `event_id`='$id'";

    if (mysqli_query($conn, $sql2)) {
        echo '1';
    } else {
        echo "0"; //error
    }
}
?>