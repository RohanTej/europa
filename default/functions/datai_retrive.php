<?php
include "../connect.php";
session_start();

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM `event_data` WHERE user_id='$uid'";

$result = mysqli_query($conn, $sql);

$count = 1;
$pass = "";

$count_rows = mysqli_num_rows($result);

if ($count_rows == 0) {
    die('1');
}

while ($row = mysqli_fetch_assoc($result)) {
    $pass = $pass . "<tr id='t" . $count . "'><td class='id invisible' id='event_id'>" . $row['event_id'] . "</td> <td class='id' id='uid'>" . $row['id'] . "</td> <td class='id' id='name'>" . $row['name'] . "</td> <td class='id' id='loc'>" . $row['location'] . "</td> </tr>";
    $count++;
}

echo $pass;
?>