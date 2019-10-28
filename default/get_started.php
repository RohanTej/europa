<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Welcome!</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
	
	<!-- Optional theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Europa - Get Started</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-light navbar-light">
        <!-- Brand  -->
        <a class="navbar-brand title" href="index"><img src="assets/title.png" alt="EUROPA" height="40px"></a>

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
                    <h5 class="card-header" id="head_1">
                        <a data-toggle="collapse" href="#collapse_1" aria-expanded="true" aria-controls="collapse" id="heading" class="d-block">
                            <img src="svg/chevron-bottom.svg" alt="chevron-bottom" style="height: 18px; width: 18px; float: right; margin-top: 4px;" class="fa" id="icon">
                            <span id="header_1">Create an account</span>
                        </a>
                    </h5>
                    <div id="collapse_1" class="collapse show" aria-labelledby="heading"  id="body_1">
                        <div class="card-body">
                            <span id="body_1">
                                <table cellpadding="3" style="width:100%;">
                                    <tr>
                                        <td>Creating an account will not take more than 2 minutes. Get started now by creating your account with us.</td>

                                        <td><center><a href="signup"><button type="button" class="btn btn-info">Signup</button></a></center></td>
                                    </tr>
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header" id="head_2">
                        <a data-toggle="collapse" href="#collapse_2" aria-expanded="true" aria-controls="collapse" id="heading" class="d-block">
                            <img src="svg/chevron-bottom.svg" alt="chevron-bottom" style="height: 18px; width: 18px; float: right; margin-top: 4px;" class="fa">
                            <span id="header_2">Pricing</span>
                        </a>
                    </h5>
                    <div id="collapse_2" class="collapse show" aria-labelledby="heading" id="body_2">
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 15%"></th>
                                        <th style="width: 30%">Free</th>
                                        <th style="width: 30%">Standard</th>
                                        <th style="width: 30%">Pro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Target audience</td>
                                        <td>For those just starting out</td>
                                        <td>For mid-sized companies that need professional task and client management</td>
                                        <td>For companies of any size that need cutting edge project management, internal communications and sales automation tools</td>
                                    </tr>
                                    <tr>
                                        <td>Users</td>
                                        <td>6 Users</td>
                                        <td>12 Users</td>
                                        <td>Unlimited</td>
                                    </tr>
                                    <tr>
                                        <td>Cost</td>
                                        <td>Free</td>
                                        <td>₹1000/event</td>
                                        <td>Unlimited</td>
                                    </tr>
                                    <tr>
                                        <td>Online Storage</td>
                                        <td>5GB</td>
                                        <td>10GB</td>
                                        <td>Unlimited</td>
                                    </tr>
                                    <tr id="tbl_btn_row" class="invisible">
                                        <td></td>
                                        <td><button type="button" class="btn btn-light" id="btn_1">Choose</button></td>
                                        <td><button type="button" class="btn btn-light" id="btn_2">Choose</button></td>
                                        <td><button type="button" class="btn btn-light" id="btn_3">Choose</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="container-fluid invisible">
                                <center><button type="button" class="btn btn-warning btn-lg" id="next">Next</button></center>
                            </div>
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
<?php if (!isset($_SESSION['uid'])) echo "<script>show_login();</script>"; else {echo "<script>show_logout(); </script>";}?>
<script>
	console.log("Page loading");
	$(document).ready(function(){
        console.log("Page load compete");
        var option = '0';
        var log = sessionStorage.getItem('log');
        var sessName = '<?php if (isset($_SESSION['log_override'])) echo $_SESSION['log_override']?>';

        if (sessName === '1') {
            log = '1';
        }

        if (log === '1') {
            var fname = sessionStorage.getItem('fname');
            var lname = sessionStorage.getItem('lname');
            
            //First Card
            $('#head_1').addClass('bg-success');
            $('#header_1').addClass('light');
            $('#icon').attr('src', 'assets/check.png');
            $('#icon').removeClass("fa");
            $('#body_1').parent().replaceWith('');
            
            //Second Card
            $('#tbl_btn_row').removeClass('invisible');
            $('#next').parent().parent().removeClass('invisible');
        }

        $('#success').click( function() {
            var head = $('#head_1');
            var heading = $('#header_1');
            var body = $('#body');
            head.addClass('bg-success');
            heading.addClass('light');
            heading.addClass('show');
        });

        $(document).on('click', '#btn_1', function(){
            $('#tbl_btn_row').replaceWith('<tr id="tbl_btn_row"><td></td><td><button type="button" class="btn btn-success" id="btn_1">Choose</button></td><td><button type="button" class="btn btn-light" id="btn_2">Choose</button></td><td><button type="button" class="btn btn-light" id="btn_3">Choose</button></td></tr>');
            option = '1';
        });

        $(document).on('click', '#btn_2', function(){
            $('#tbl_btn_row').replaceWith('<tr id="tbl_btn_row"><td></td><td><button type="button" class="btn btn-light" id="btn_1">Choose</button></td><td><button type="button" class="btn btn-success" id="btn_2">Choose</button></td><td><button type="button" class="btn btn-light" id="btn_3">Choose</button></td></tr>');
            option = '2';
        });

        $(document).on('click', '#btn_3', function(){
            $('#tbl_btn_row').replaceWith('<tr id="tbl_btn_row"><td></td><td><button type="button" class="btn btn-light" id="btn_1">Choose</button></td><td><button type="button" class="btn btn-light" id="btn_2">Choose</button></td><td><button type="button" class="btn btn-success" id="btn_3">Choose</button></td></tr>');
            option = '3';
        });

        $(document).on('click', '#next', function() {
            var selected_option = 0;
            if (option === '1') {
                selected_option = 1;
            } else if (option === '2') {
                selected_option = 2;
            } else if (option === '3') {
                selected_option = 3;
            } else {
                $('#tbl_btn_row').addClass('table-danger');
                return false;
            }
            
            $.ajax({
                url: 'med.php',
                data: {option: selected_option},
                type: 'POST',
                success: function(data) {
                    window.location.href = 'intersite';
                },
                error: function(data) {
                    console.log("There was a major error");
                }
            });
        });
	});
</script>
</body>
</html>