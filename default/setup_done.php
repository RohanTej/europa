<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Welcome!</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/check.css">
	
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
	
	<!-- Optional theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-light navbar-light">
        <!-- Brand  -->
        <a class="navbar-brand title" href="home"><img src="assets/title.png" alt="EUROPA" height="40px"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar links -->
        <div class="collapse navbar-collapse w-100 order-3" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li id="nav_name" class="nav-item pad invisible">
            <h5><?php if (isset($_SESSION['fname'])) {echo $_SESSION['fname'] . " " . $_SESSION['lname'];} ?></h5>
            </li>
            <li id="nav_loi" class="nav-item pad divider-vertical invisible">
            <a style="cursor: pointer;" class="btn btn-sm btn-outline-secondary" id="logout">Logout</a>
            </li>
            <li id="nav_log" class="nav-item pad invisible">
            <a style="cursor: pointer;" class="btn btn-sm btn-outline-info" id="login">Login</a>
            </li>
        </ul>
        </div>
    </nav>
	<div class="container">
        <br><br>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <center>
                                <div class="checkmark-circle">
                                    <div class="background"></div>
                                    <div class="checkmark draw"></div>
                                </div>
                                </center>
                            </div>
                            <div class="col-sm-6">
                                <br><br>
                                <span id="time">You're all setup! Redirecting you to dasboard in <b>5</b> second(s).</span>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-1"></div>
        </div>
        <br><br><br>
	</div>
<script src="js/jquery-latest.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script>
  function show_login() {
      $('#nav_log').removeClass('invisible');
    }

  function show_logout() {
    $('#nav_name').removeClass('invisible');
    $('#nav_loi').removeClass('invisible');
  }
</script>
<script>
  $(document).ready(function(){
    
    $(document).on('click', '#login',function(){
      console.log('redirect');
      window.location.href = 'login';
    });

    $(document).on('click', '#logout',function(){
      console.log('clicked');
      $.ajax({
      url: 'logout.php',
      success: function(data) {
        window.location.href = 'index';
      },
      error: function(data) {
        $('#er').html("There was a major error");
      }
      });
      window.location.href = 'index';
    });    
	});
</script>
<?php if (!isset($_SESSION['uid'])) echo "<script>show_login();</script>"; else echo "<script>show_logout();</script>";?>
<script>
	console.log("Page loading");
	$(document).ready(function(){
        console.log("Page load compete");
        
        var counter = 5;
        var interval = setInterval(function() {
            counter--;
            $('#time').replaceWith("<span id='time'>You're all setup! Redirecting you to dasboard in <b>" + counter + "</b> second(s).</span>");

            if (counter == 0) {
                window.location.href = 'home';
            }
        }, 1000);
	});
</script>
</body>
</html>