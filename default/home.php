<!DOCTYPE html>
<html>
<?php session_start();?>
<head>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Dashbord</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/style2.css">   
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">

    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Europa - Dashboard</title>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>
            
            <ul class="list-unstyled components">
                <center><p><i class="fas fa-user"></i><span style="padding: 10px"><?php if (isset($_SESSION['fname'])) {echo $_SESSION['fname'] . " " . $_SESSION['lname'];} ?></span></p></center>
                <li id="1" class="active">
                    <a style="cursor: pointer;">Home</a>
                </li>
                <li id="2">
                    <a id="20" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li id="22">
                            <a style="cursor: pointer;">Create Event</a>
                        </li>
                        <li id="23">
                            <a style="cursor: pointer;">Delete Event</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a id="logout" style="cursor: pointer;" class="btn btn-outline-dark btn-small">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" style="cursor: pointer;" id="#language"><i class="fas fa-language"></i>  Language</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=""><i class="fas fa-cog"></i>  Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="contain">

            </div>
        </div>
    </div>

<script src="js/jquery-latest.min.js"></script>
<script src="js/pooper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script src="js/customscroller.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
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
        window.location.href = 'logout';
        });

        //_________________________________________________________________//

        function loader() {
		    $('#contain').html("<center><img src='assets/ajax-loader.gif'></center>");
        }
        
        $('#sidebar ul li a').click(function(e) {
            console.log("click");
            $('#sidebar li.active').removeClass('active');
            
            var $parent = $(this).parent();
            $parent.addClass('active');
            e.preventDefault();
        });


        //This code runs after page loads
        //dispalay loader
        loader();

        //display first page
        $('#contain').load("homei.php");

        //menu options
        $('#1').click(function(){
            loader();
			$('#contain').load("homei.php");
        });

        $('#20').click(function(){
            loader();
			$('#contain').load("managei.php");
        });
        
        $('#22').click(function(){
            loader();
			$('#contain').load("createi.php");
        });
        
        $('#23').click(function(){
            loader();
			$('#contain').load("deletei.php");
		});
    });
</script>
</body>

<script>
  function show_login() {
      window.location.href = 'index';
    }

  function show_logout() {
    
  }
</script>
<?php if (!isset($_SESSION['uid'])) echo "<script>show_login();</script>"; else echo "<script>show_logout();</script>";?>

</html>