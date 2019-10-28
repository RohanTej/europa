<?php
    function get_url() {
        if (isset($_GET['id'])) {
            echo $_GET['id'];
        } else {
           echo 'error';
        }
    }
?>
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
	<title>Europa - Event Management Services</title>
</head>
<body style="overflow-x: hidden;">
	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<!-- Brand  -->
		<a class="navbar-brand title" href="index"><img src="assets/title.png" alt="EUROPA" height="40px"></a>
    </nav>
    <span id="uri" class="invisible"><?php echo $uri;?></span>
	<div class="container-fluid">
		<br><br>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div id="main" class="card card-default">
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>
					<div class="card-body">
						<h1 id="title"></h1>
                        <h6 id="author"></h6>
                        <br><br>
                        <form onsubmit="return false">
                        <table class="radio" style="width: 100%;">
                            <tr><td colspan="2"><input type="text" class="c-form-control" maxlength="128" placeholder="Full Name"></td></tr>
                            <tr><td><br></td></tr>
                            <tr>
                                <td><center><input type="radio" name="group" id="c" checked> Coming</center></td>
                                <td><center><input type="radio" name="group" id="m"> Maybe</td></center>
                                </tr>
                            <tr><td><br></td></tr>
                            <tr><td colspan="2"><center><button id="submit" class="btn btn-lg btn-outline-success">Submit</button></center></td></tr>
                            <tr><td colspan="2"><center><div id="er"></div></center></td></tr>
                        </table>
                        </form>
					</div>
				</div>
                <div id="error" class="card invisible">
                    <div class="card-header bg-danger">
                        <h3 style="color: white;">Register</h3>
                    </div>
					<div class="card-body">
						<p>404: Event not found</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<br><br><br>
	</div>
</body>
<script src="js/jquery-latest.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script>
	console.log("Page loading");
	$(document).ready(function(){
		console.log("Page load compete");

        var url = "<?php echo get_url();?>";
        console.log(url);

		if ((url == '') || (url == 'error')) {
            console.log('error');
            $('#main').replaceWith('');
            $('#error').removeClass('invisible');
        } else {
            console.log('working...');
            $.ajax({
            url: 'functions/register_f.php',
            data: {check: '1', id: url},
            type: 'POST',
            success: function(responce) {
                var res = responce.split(",");
                $('#title').replaceWith('<h1 id="title">' + res[0] + '</h1>');
                $('#author').replaceWith('<h6 id="author">' + res[1] + '</h6>');            
            },
            error: function(repsopnce) {
                console.log("There was a major error: " + repsopnce);
            }
            });
        }

		$("#submit").on('click',function(){
            $('#submit').addClass('disabled');
            var val = 0;
            if($('#c').is(':checked')) { val = 0; }
            if($('#m').is(':checked')) { val = 1; }
            
            
            $.ajax({
                url: 'functions/register_f.php',
                data: {check: '0', id: url, v: val},
                type: 'POST',
                success: function(responce) {
                    if ($.trim(responce) == "1") {
                        $('#main').replaceWith('<h5 class="card-header bg-success"><img src="assets/check.png" style="height: 18px; width: 18px; float: right; margin-top: 4px;"><span class="light">Registration Completed!</span></h5>');
                    } else {
                        $('#er').html("Error :");
                        $('#er').append(responce);
                        return false;
                    }
                },
                error: function(repsopnce) {
                    $('#er').html("There was a major error" + responce);
                }
            });
                    
        });
	});
</script>
</html>