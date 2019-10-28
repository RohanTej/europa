<script src="js/jquery-latest.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script>
  $(document).ready(function(){
    console.log("Page load compete");
    
	});
</script>
<?php 
include "connect.php";
session_start();


$uid = $_SESSION['uid'];

if (isset($_SESSION['access'])) {
  
  if ($_SESSION['access'] == 'set') {
    $option = $_SESSION['option'];
    $sql = "UPDATE `users` SET `access`='$option' WHERE `users`.`uid` = $uid";

    if (mysqli_query($conn, $sql)) {
      $_SESSION['access'] == 'unset';
      header("Location: setup_done");
      return false;
    } else {
      $_SESSION['access'] == 'unset';
      echo "Major error x00";
      return false;
    }
  }
}

$sql = "SELECT * FROM `users` WHERE uid='$uid'";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
  $row = mysqli_fetch_assoc($result);
  $access = $row['access'];

  if ($access == '0') {
    $_SESSION['log_override'] = '1';
    header("Location: get_started");
  } else {
    header("Location: home");
  }
} else {
  echo 'Major Error x01';
}

?>