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

        .table-light, .table-light:hover {
            color: black !important;
        }

        .color {
            color: #444444 !important;
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
                    <h3>Manage Event</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-dark table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Event ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody id="table">

                                </tbody>
                            </table>
                            <span style="float: right;"><button id="succ" class="btn btn-md btn-outline-success invisible">Load</button></span>
                        </div>
                    </div>
                    <div class="reload">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="att" class="invisible">
                                    <h4>Attendance: </h4>
                                    <table class="table">
                                        <tr>
                                            <td><i class="fa fa-check"></i> You have <span id="c"></span> confirmed guests</td>
                                            <td><i class="fas fa-question"></i> You have <span id="m"></span> unconfirmed guests</td>
                                        </tr>
                                    </table>

                                    <span>Share this link with your guest to invite them to your event -</span> <br>
                                    <div class="input-group mb-3" style="margin: 10px 0;" >
                                        <input type="text" class="form-control text-center" id="url" value="test" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="newTab"><i class="fas fa-external-link-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="loader"><center><img src='assets/ajax-loader.gif' id='loader'></center></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="weather">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
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
        $('#table').html('<tr><td colspan="4"><center>No Events Created.</center></td><tr>');
        $('#loader').addClass('invisible');

        $(document).on('click', '#search', function(){
            $('#dbutton').html('<button id="search" class="btn btn-md btn-outline-warning">Search</button>');
            var loc = $('#loc').val();
            loc = loc.replace(' ', '%20');
            loc = loc.replace(',', '%2C');
            
            $('#map').attr('src', "https://maps.google.com/maps?q=" + loc + "&t=&z=13&ie=UTF8&iwloc=&output=embed");
            auth_2 = '1';
        });

        $('#newTab').on('click', function(){
            var event_id = $('#' + id + ' #event_id').text();
            var win = window.open('register?id=' + event_id, '_blank');            
            win.focus();
            
        });

        //load data
        $.ajax({
            url: 'functions/datai_retrive.php',
            type: 'POST',
            success: function(responce) {
                if ($.trim(responce) != 1) {
                    $('#table').html(responce);
                }
            },
            error: function(repsopnce) {
                $('#er').html("There was a major error: " + responce);
            }
        });

        //select function
        $(document).on('click', '.id', function() {    
            id = $(this).parent().attr('id');

            $('.id').parent().removeClass('table-light');

            $('#' + id).addClass('table-light');
            $('#succ').removeClass('invisible');
        });

        //get function
        $('#succ').on('click', function() {
            console.log('Getting weather data');
            $('#weather').replaceWith('<div id="weather"></div>');
            $('#loader').removeClass('invisible');
            uid = $('#' + id + ' #uid').text();
            var name = $('#' + id + ' #name').text();
            var event_id = $('#' + id + ' #event_id').text();

            var loc = $('#' + id + ' #loc').text();
            var loc_html = loc.replace(',', '%2C');
            loc_html.replace(/\s+/g,'%20'); //remove all whitespaces
            
            console.log(loc);

            $('#map').attr('src', "https://maps.google.com/maps?q=" + loc_html + "&t=&z=13&ie=UTF8&iwloc=&output=embed");
            
            $.ajax({
            url: 'functions/managei2_f.php',
            data: { id: id, e_id: event_id},
            type: 'POST',
            success: function(responce) {
                var res = responce.split(",");
                $('#c').replaceWith('<span id="c">'+ res[0] +'</span>');
                $('#m').replaceWith('<span id="m">'+ res[1] +'</span>');
                $('#url').attr('value', res[2]);
                $('#att').removeClass('invisible');
                $('#loader').removeClass('invisible');
            },
            error: function(repsopnce) {
                console.log("There was a major error");
            }
            });

            $.ajax({
            url: 'functions/managei_f.php',
            data: { loc: loc, loc_html: loc_html},
            type: 'POST',
            success: function(responce) {
                console.log('Weather updated');
                $('#weather').replaceWith('<div id="weather">' + responce + '</div>');
                $('#loader').addClass('invisible');
            },
            error: function(repsopnce) {
                console.log("There was a major error");
            }
            });
            
        });
    });
</script>
</html>