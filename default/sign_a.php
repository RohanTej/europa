<?php
include "connect.php";
session_start();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "SELECT * FROM `users` WHERE username='$email'";

$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count == 1) {
  echo "2";
} else {
  
  $fname = stripslashes($fname);
  $lname = stripslashes($lname);
  $email = stripslashes($email);
  $pass = stripslashes($pass);

  $pass = md5($pass);

  $sql = "INSERT INTO `users` SET username='$email', password='$pass', fname='$fname', lname='$lname'";

  if (mysqli_query($conn, $sql)) {
    $sql = "SELECT * FROM `users` WHERE username='$user' AND password='$pass'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $row = mysqli_fetch_assoc($result);
      
      $_SESSION['uid'] = $row['uid'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      
      echo "1";

    } else {
      echo "0"; //error
    }
  } else {
    echo "0"; //error
  }
}
?>