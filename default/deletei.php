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
        .table-light {
            color: black !important;
        }

    </style>
  </head>
  <body>
    <div class="container-fluid">
        <!--ROW 0 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card" id="main">
                <div class="card-header" id='please'>
                    <h3>Delete Event</h3>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Event ID</th>
                                <th>Name</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody id="table">

                        </tbody>
                    </table>
                    <span style="float: right;"><button id="del" class="btn btn-md btn-danger invisible">Delete</button></span>
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
        $('#table').html('<tr><td colspan="4"><center>No Events Created.</center></td><tr>');
        var uid;

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

            $('.id').parent().removeClass('table-danger');

            $('#' + id).addClass('table-danger');
            $('#del').removeClass('invisible');
        });

        //delete function
        $(document).on('click', '#del', function() {
            uid = $('#' + id + ' #uid').text();
            $.ajax({
            url: 'functions/deletei_f.php',
            data: {uid: uid,},
            type: 'POST',
            success: function(responce) {
                if ($.trim(responce) == "1") {
                    var text = "Event with id " + uid + " has been deleted!";
                    $('#main').replaceWith('<h5 class="card-header bg-success"><img src="assets/check.png" style="height: 18px; width: 18px; float: right; margin-top: 4px;"><span class="light">Event Deleted!</span></h5><div class="card-body"><span>' + text + '</span></div>');
                    return false;
                } else {
                    console.log("There was an error: " + responce);
                    return false;
                }
                
            },
            error: function(repsopnce) {
                console.log("There was a major error: " + responce);
            }
            });  
        });
    });
</script>
</html>