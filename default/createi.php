<html>
  <?php require "functions.php";?>
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <style>
        body {
            overflow-x: hidden;
        }
        .row {
            margin-top: 15px;
        }
        .map-container{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <!--ROW 0 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                    <h3>Create Event</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body" id="main">
                                    <form onsubmit="return false">
                                        <table style="width: 100%;" cellpadding="10px">
                                            <tr> 
                                            <td colspan="2"><div id="dname"><input type="text" class="c-form-control" id="name" maxlength="128" placeholder="Event Name"></div></td>
                                            </tr>
                                            <tr><td><br></td></tr>
                                            <tr> 
                                            <td><div id="dloc"><input type="text" class="c-form-control" id="loc" maxlength="64" placeholder="Location"></div></td>
                                            <td><center><div id="dbuttom"><button id="search" class="btn btn-md btn-outline-warning">Search</button></div></center></td>
                                            </tr>
                                            <tr><td><br></td></tr>
                                            <tr><td colspan="2"><center><button id="submit" class="btn btn-md btn-primary">Create</button></center></td></tr>
                                            <tr><td><br></td></tr>
                                            <tr><td><center><div id="er"></div></center></td></tr>
                                        </table>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                                        <iframe id="map" src="https://maps.google.com/maps?t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>        
                </div>
                </div>
            </div>
        </div>
  </body>
<script src="js/jquery-latest.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/md5.js"></script>
<script>
    $(document).ready(function () {
        var auth_2 = '0';

        $(document).on('click', '#search', function(){
            $('#dbutton').html('<button id="search" class="btn btn-md btn-outline-warning">Search</button>');
            var loc = $('#loc').val();
            loc = loc.replace(' ', '%20');
            loc = loc.replace(',', '%2C');
            
            $('#map').attr('src', "https://maps.google.com/maps?q=" + loc + "&t=&z=13&ie=UTF8&iwloc=&output=embed");
            auth_2 = '1';
        });

        $(document).on('click', '#test', function(){
            var text = "Hello World!";
            $('#main').replaceWith('<h5 class="card-header bg-success"><img src="assets/check.png" style="height: 18px; width: 18px; float: right; margin-top: 4px;"><span class="light">Create an account</span></h5><div class="card-body"><span>' + text + '</span></div>');
        });

        $('#submit').on('click', function(){
            console.log('1');
            var name = $('#name').val();
            var loc = $('#loc').val();

            $('#dname').html('<input type="text" class="c-form-control" id="name" maxlength="128" placeholder="Event Name" value="' + name + '">');
            $('#dloc').html('<input type="text" class="c-form-control" id="loc" maxlength="64" placeholder="Location" value="' + loc + '">');
            $('#dbutton').html('<button id="search" class="btn btn-md btn-outline-warning">Search</button>');


            if (name == '') $('#dname').html('<input type="text" class="c-form-control error" id="name" maxlength="128" placeholder="Event Name">');
            if (loc == '') $('#dloc').html('<input type="text" class="c-form-control error" id="loc" maxlength="64" placeholder="Location">');
            if (auth_2 == '0') $('#dbuttom').html('<button id="search" class="btn btn-md btn-outline-danger">Search</button>');

            if (name != '' && loc != '' && auth_2 == '1') {
                var text = "Event with name <b>" + name + "</b> has been created. You can view your open event under Events tab on the left!";
                $.ajax({
					url: 'functions/createi_f.php',
					data: {name: name, loc: loc,},
					type: 'POST',
					success: function(responce) {
						if ($.trim(responce) == "1") {
							
                            $('#main').replaceWith('<h5 class="card-header bg-success"><img src="assets/check.png" style="height: 18px; width: 18px; float: right; margin-top: 4px;"><span class="light">Event created successfully!</span></h5><div class="card-body"><span>' + text + '</span></div>');
							return false;
						} else {
							$('#er').html("Error :");
							$('#er').append(responce);
							return false;
						}
					},
					error: function(repsopnce) {
						$('#er').html("There was a major error: " + responce);
					}
				});
            }
        });
    });
</script>
</html>