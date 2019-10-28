<?php session_start();?>
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
	<title>Sign up</title>
</head>
<body style="overflow-x: hidden;">
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
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="card card-default">
					<div class="card-body">
						<center><h2>Sign up</h2></center>
						<br><br>
						<table style="width: 100%;" cellpadding="10px">
							<tr> 
							<td><div id="dfname"><input type="text" class="c-form-control" id="fname" style="width: 98%;" maxlength="128" placeholder="First Name*"></div></td>
							<td><div id="dlname"><input type="text" class="c-form-control" id="lname" maxlength="128" placeholder="Last Name*"></div></td>
							</tr>
							<tr><td><br></td></tr>
							<tr> 
							<td colspan="2"><div id="demail"><input type="text" class="c-form-control" id="email" maxlength="128" placeholder="Email Address*"></div></td>
							</tr>
							<tr><td><br></td></tr>
							<tr> 
							<td colspan="2"><div id="dpass"><input type="password" class="c-form-control" id="pass" maxlength="64" placeholder="Password*"></div></td>
							</tr>
							<tr><td><br></td></tr>
							<tr> 
							<td colspan="2"><div id="dcpass"><input type="password" class="c-form-control" id="cpass" maxlength="64" placeholder="Confirm Password*"></div></td>
							</tr>
							<tr><td><br></td></tr>
							<tr><td colspan="2"><center><button id="submit" class="btn btn-lg btn-warning">Submit</button></center></td></tr>
							<tr><td><br></td></tr>
							<tr><td colspan="2"><center><div id="er"></div></center></td></tr>
						</table>
						<center><div><h6 id="re" style="cursor : pointer">Already have an account? Click here to login.</h6></div></center><br>
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
		<br><br><br>
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
			window.location.href = ('login');
		});
		$("#submit").on('click',function(){
			//getting vaules into variables
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var email = $('#email').val();
			var pass = $('#pass').val();
			var cpass = $('#cpass').val();
			var error = "false";
			var er = "false";
			
			//reseting the form
			$('#dfname').html("<input placeholder='First Name*' style='width: 98%' type='text' class='c-form-control' maxlength='128' id='fname' value='" + fname + "'>");
			$('#dlname').html("<input placeholder='Last Name*' type='text' class='c-form-control' maxlength='128' id='lname' value='" + lname + "'>");
			$('#demail').html("<input placeholder='Email Address*' type='text' class='c-form-control' maxlength='128' id='email' value='" + email + "'>");
			$('#dpass').html("<input placeholder='Password*' type='password' class='c-form-control' maxlength='64' id='pass'>");
			$('#dcpass').html("<input placeholder='Confirm Password*' type='password' class='c-form-control' maxlength='64' id='cpass'>");
			
			
			
			//checking if the values are empty
			if ((fname) === ''){$('#dfname').html("<input placeholder='First Name*' style='width: 98%' type='text' class='c-form-control error' maxlength='128' id='fname' value='" + fname + "'>"); error = "true";}
			if ((lname) === ''){$('#dlname').html("<input placeholder='Last Name*' type='text' class='c-form-control error' maxlength='128' id='lname' value='" + lname + "'>"); error = "true";}
			if ((email) === ''){$('#demail').html("<input placeholder='Email Address*' type='text' class='c-form-control error' maxlength='128' id='email' value='" + email + "'>"); error = "true";}
			if ((pass) === ''){$('#dpass').html("<input placeholder='Password*' type='password' class='c-form-control error' maxlength='64' id='pass'>"); error = "true";}
			if ((cpass) === ''){$('#dcpass').html("<input placeholder='Confirm Password*' type='password' class='c-form-control error' maxlength='64' id='cpass'>"); error = "true";}
			
			//checking if passwords mached
			if (pass != cpass) {
				console.log("Passwords did not match");
				$('#dpass').html("<input placeholder='Password*' type='password' class='c-form-control error' maxlength='64' id='pass'>");
				$('#dcpass').html("<input placeholder='Confirm Password*' type='password' class='c-form-control error' maxlength='64' id='cpass'>");
				$('#er').html("Passwords did not match");
				error = "true";
				er = "true";
			}
			
			if (error == "false") {
				console.log("no errors");
				$.ajax({
					url: 'sign_a',
					data: {fname: fname, lname: lname, email: email, pass: pass,},
					type: 'POST',
					success: function(responce) {
						if ($.trim(responce) == "1") {
							$('#er').html("Success");
							sessionStorage.setItem('fname', fname);
							sessionStorage.setItem('lname', lname);
							if (sessionStorage.getItem('location') === 'get_started') {
								sessionStorage.setItem('log', '1');
								window.location.href = "get_started";
							} else {
								window.location.href = "success";
							}
						} 
						if ($.trim(responce) == "0") {
							$('#er').html("There was an error with the connection, <br>please try again later<br>");
							$('#er').append(responce);
						}
						if ($.trim(responce) == "2") {
							$('#er').html("This account already exists. <br> <a href='login'>Click here</a> to login.");
							$('#demail').html("<input type='text' class='c-form-control error' maxlength='128' id='email' value='" + email + "'>"); error = "true";
						}
					},
					error: function(repsopnce) {
						$('#er').html("There was a major error");
					}
				});
			} else {
				$('#er').html("Please fill the data properly.");
				if (er == "true") {
					$('#er').html("Passwords did not match");
				}
			}
		});
	});
</script>
</html>