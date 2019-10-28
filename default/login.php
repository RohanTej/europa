<?php session_start(); $_SESSION['access'] = 'unset';?>
<!doctype html>
<html lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
    <title>Europa - Login</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
	<!-- Optional theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Login</title>
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
	<div class="container-fluid">
		<br><br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card card-default">
					<div class="card-body">
						<center><h2>Login</h2><br><br></center>
						<form action="POST" onsubmit="return false">
							<table style="width: 100%;" cellpadding="10px">
								<tr> 
								<td colspan="2"><div id="demail"><input type="text" class="c-form-control" id="email" maxlength="128" placeholder="Email Address"></div></td>
								</tr>
								<tr><td><br></td></tr>
								<tr> 
								<td colspan="2"><div id="dpass"><input type="password" class="c-form-control" id="pass" maxlength="64" placeholder="Password"></div></td>
								</tr>
								<tr><td><br></td></tr>
								<tr><td colspan="2"><center><button id="submit" class="btn btn-md btn-info">Login</button></center></td></tr>
								<tr><td><br></td></tr>
								<tr><td><center><div id="er"></div></center></td></tr>
							</table>
						</form>
						<center><div><h6 id="re" style="cursor : pointer">Don't have an account? Click here to register.</h6></div></center>
					<div>
				</div>
			</div>
			<div class="col-md-4"></div>
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
	window.location.href = 'home';
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
		$('#re').on('click',function(){
			window.location.href = ('signup');
		});
		
		$('#submit').on('click', function(){
			
			//getting vaules into variables
			var email = $('#email').val();
			var pass = $('#pass').val();
			var error = "false";
			
			//pass = calcMD5(pass);
			
			//reseting the form
			$('#demail').html("<input type='text' class='c-form-control' maxlength='128' id='email' value='" + email + "'>");
			$('#dpass').html("<input type='password' class='c-form-control' maxlength='64' id='pass' placeholder='Password'>");
			
			//checking if the values are empty
			if (email === ''){$('#demail').html("<input type='text' class='c-form-control error' maxlength='128' id='email' placeholder='Email Address'>"); error = "true";}
			if (pass === ''){$('#dpass').html("<input type='password' class='c-form-control error' maxlength='64' id='pass' placeholder='Password'>"); error = "true";}
			
			
			if (error == "false") {
				console.log("no errors");
				$.ajax({
					url: 'login_a',
					data: {email: email, pass: pass,},
					type: 'POST',
					success: function(responce) {
						if ($.trim(responce) == "1") {
							$('#er').html("Success");
							window.location.href = "intersite";
							console.log("successful login");
							return false;
						} else {
							$('#er').html("Error :");
							$('#er').append(responce);
							$('#dpass').html("<input type='password' class='c-form-control error' maxlength='64' id='pass' placeholder='Password'>");
							return false;
						}
					},
					error: function(repsopnce) {
						$('#er').html("There was a major error");
					}
				});
			} else {
				$('#er').html("Please fill the data properly.");
			}
		});
	});
</script>
</body>
</html>