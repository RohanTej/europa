<!DOCTYPE html>
<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Dashbord</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
  
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/style2.css">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">

  <!-- Font Awesome JS -->
  <script defer src="js/solid.js"></script>
  <script defer src="js/fontawesome.js"></script>
  

	<!-- Optional theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <title>Europa - Get Started</title>
</head>
<body>
<div class="row">
<div class="col-xl-12">      
  <nav class="navbar navbar-expand-md bg-light navbar-light">
    <!-- Brand  -->
    <a class="navbar-brand title" href="#"><img src="assets/title.png" alt="EUROPA" height="40px"></a>

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
</div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="wrapper">
      <div class="col-sm-2">
      
        <nav id="sidebar">
          <div class="sidebar-header">
              <h3>Dashboard</h3>
          </div>

          <ul class="list-unstyled components">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                  <a href="#">Home 1</a>
                </li>
                <li>
                  <a href="#">Home 2</a>
                </li>
                <li>
                  <a href="#">Home 3</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">About</a>
            </li>
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="#">Page 1</a>
                </li>
                <li>
                  <a href="#">Page 2</a>
                </li>
                <li>
                  <a href="#">Page 3</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Portfolio</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>

          <ul class="list-unstyled CTAs">
            <li>
              <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
              <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
          </ul>
        </nav>
      </div>
    
      <div class="col-sm-10">
        <div id="content">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span id='#num'>Toggle Sidebar</span>
              </button>
            </div>
          </nav>
        </div>
      </div>


    </div>
  </div>
</div>
<div id="mobile-indicator"></div>
</body>

<script src="js/jquery-latest.min.js"></script>
<script src="js/pooper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script src="js/customscroller.js"></script>
<script>
  function show_login() {
      window.location.href = 'index';
      $('#nav_log').removeClass('invisible');
    }

  function show_logout() {
    $('#nav_name').removeClass('invisible');
    $('#nav_loi').removeClass('invisible');
  }
</script>
</html>
<?php if (!isset($_SESSION['uid'])) echo "<script>show_login();</script>"; else echo "<script>show_logout();</script>";?>
<?php ?>
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

    $("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    isMobileWidth();
    $(window).resize(isMobileWidth());
    
    $(window).resize(function() {
      var viewportWidth = $(window).width();
      $('#num').replaceWith('<span id='#num'>'+ viewportWidth +'</span>')
    });

    function isMobileWidth() {
      if ($("#mobile-indicator").css("float") == "none" ) {
        $('#sidebar').addClass('invisible');
        $('#content').addClass('red');
      } else {
        $('#sidebar').removeClass('invisible');
      }
    }
	});
</script>
</html>