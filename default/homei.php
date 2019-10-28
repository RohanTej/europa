<html>
  <?php require "functions.php";?>
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/md5.js"></script>
    <style>
      body {
        overflow-x: hidden;
      }
      
      h3, h2 {
        /*color: #FF8000;*/
      }

      .row {
        margin-top: 15px;
      }

      .well {
        /* background-color: #e8edf3; */
      }
      
      #time{
        font-size: 40px;
        color: #242323;
      }
    </style>
  </head>
  <body>
    <div class="container">
      

      <!--ROW 1 -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3>Overview</h3>
            </div>
            <div class="card-body">
              <table cellpadding="3"><tr>
                <td><i class="fa fa-calendar fa-3x" aria-hidden="true"></i><td>
                <td style="padding-top: 10px;"><h5>You have <?php echo check_event($_SESSION['uid']);?> active events.</h5></td>
              </tr></table>
              
            </div>
          </div>
        </div>
      </div>

      <!--ROW 2 -->
      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-header">
              <h3>Time</h3>
            </div>
            <div class="card-body">
              <?php echo date('l') . ", " . date('d') . "-" . date('m') . "-20" . date('y') ?> <br><br>
              <span id="time"></span>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header">
              <h3>Currency</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <tr><td class="text-right">1 USD :</td><td id="money"></td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        setInterval(function(){
          var dt = new Date();
          var time = "<b>" + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds() + "</b>";
          $('#time').html(time);
        },1000);

        $.ajax({
          url: 'functions/currencyi.php',
          type: 'POST',
          success: function(responce) {
              $('#money').replaceWith('<td id="money">' + responce + 'INR</td>');
          },
          error: function(repsopnce) {
              console.log("There was a major error");
          }
        });    
      });
    </script>
  </body>
</html>