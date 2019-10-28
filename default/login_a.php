<?php
	Include "connect.php";
  session_start();

  $user = $_POST['email'];
  $pass = $_POST['pass'];

  $user = stripslashes($user);
  $pass = stripslashes($pass);

  $pass = md5($pass);

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
    echo 'Wrong username or password!';
  }
?>