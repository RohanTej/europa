<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Welcome!</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/check.css">
	
	<!-- Bootstrap core CSS -->
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
        <h2 id="welcome"></h2>
        <p>You want your first event to be a success. So let's go over a few things you want to look at to get started!</p>
        <br>
        <div class="card-deck">
            <div class="card card-default">
                <div class="card-header">
                    <center><img src="svg/home.svg" alt="home" style="height: 18px; width: 18px"></center>
                </div>
                <div class="card-body">
                    Europa is a reliable and professional tool that helps you tackle all the key tasks that makes an event successful. Which includes – creation of a dedicated website, registrations, reservations, payments, check-in etc. all in one place so you can manage your even as efficiently as possible.
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <center><img src="svg/cog.svg" alt="cog" style="height: 18px; width: 18px"></center>
                </div>
                <div class="card-body">
                    Europa is highly customizable. So much so that we can offer custom solutions if you are trying to manage a very large event - a party on the moon, perhaps?
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <center><img src="svg/dollar.svg" alt="currency" style="height: 18px; width: 18px"></center>
                </div>
                <div class="card-body">
                Europa's powerful and simple payment gateway will make it easy for guests to pay for reservations or tickets. Our system will allow you to integrate payments with registration process so you don't have to spend time create a separate payment system. We will manage everything! From transaction to verification and beyond.
                </div>
            </div>
        </div>
        <br><br>
        <center>
        <div class="row">
            <div class="col-md-8">
                <h4>Click on the button to start managing your very first event!</h4><br>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success btn-lg" id="next">Start!</button>
            </div>
        </div>
        </center>
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
        sessionStorage.setItem('log', '1');
        var fname = sessionStorage.getItem('fname');
        var lname = sessionStorage.getItem('lname');

		$('#welcome').html("Welcome to Europa, " + fname + " " + lname + "!");

        $(document).on('click', '#next', function(){
            window.location.href = "get_started";
        });
	});
</script>
</body>
</html>