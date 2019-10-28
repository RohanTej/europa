<!DOCTYPE html>
<?php session_start(); ?>
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
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-7">
            <h2>Event Management</h2>
            <p>
              Our event management service ensures a creative and professional approach to your next event. We can project manage your event, from sourcing the right venue, to creation and development, through to on the day management of the event. 
              <br><br>
              We can help with as much or as little as you need!
              <br><br>
              Our experienced team manages events the world over. Every country brings its own unique challenges and our knowledge of working regularly in the UK, Europe, the US, Caribbean, Middle East and Africa will ensure your event runs smoothly regardless of the location.
            </p>
          </div>
          <div class="col-sm-3">
            <br><br>
            <div class="card card-default">
              <div class="card-body">
                <p>Create your very first event in a few simple steps. Click the button below to get started</p>
                <br><br>
                <span style="float: right;"><a href="get_started"><button type="button" class="btn btn-primary btn-md">Get Started</button></a></span>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>
        <center>
        <br><br>
        <img src="assets/welcome-photo.webp" style="width: 90%;">  
        <br><br><br>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <blockquote class="blockquote">
              <p class="mb-0">One of the easiest event management system I've ever used</p>
              <footer class="blockquote-footer">Author, XYZ Newspaper</footer>
            </blockquote>
          </div>
          <div class="col-sm-4"></div>
        </div>

        <div class="container-fluid orange-box">
          <div class="row" style="width: 100%;">
            <div class="col-sm-1"></div>
            <div class="col-sm-7"><h3>To learn more about our services, click the button</h3></div>
            <div class="col-sm-3">
              <a href="product"><button type="button" class="btn btn-primary btn-md pad" id="lm">Learn More</button></a>
            </div>
          <div class="col-sm-1"></div>
          </div>
        </div>

        </center>
      </div>
    </div>
    <br><br><br><br>
  </div>
    
</body>
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
  $(document).ready(function(){
    console.log("Page load compete");
    
    sessionStorage.setItem('log', '0');
	});
</script>
</html>