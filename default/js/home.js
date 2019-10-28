console.log("Page loading");
	$(document).ready(function(){
		console.log("Page load compete");
		function myscr() {
			var width = window.innerWidth;
			if (width < "999") {
				$('#1').html("<span class='glyphicon glyphicon-home'></span>");
				$('#2').html("<span class='glyphicon glyphicon-send'></span>");
				$('#3').html("<span class='glyphicon glyphicon-hourglass'></span>");
				$('#4').html("<span class='glyphicon glyphicon-flash'></span>");
			}
			if (width > "1000") {
				$('#1').html("<strong>Home</strong>");
				$('#2').html("<strong>Orders</strong>");
				$('#3').html("<strong>Time</strong>");
				$('#4').html("<strong>Analytics</strong>");
			}
		}
		
		myscr();
		window.onresize = function() {
			myscr();
		};
		
		$('#contain').load("homei.php");
		
		$('#title').click(function(){
			$('#contain').load("homei.php");
			$('#t').html("<tr class='active_t'><td id='1'><strong>Home</strong></td></tr><tr><td id='2'><strong>Orders</strong></td></tr><tr><td id='3'><strong>Time</strong></td></tr><tr><td id='4'><strong>Analytics</strong></td></tr>");
		});
		$('#titlee').click(function(){
			$('#contain').load("homei.php");
			$('#t').html("<tr class='active_t'><td id='1'><strong>Home</strong></td></tr><tr><td id='2'><strong>Orders</strong></td></tr><tr><td id='3'><strong>Time</strong></td></tr><tr><td id='4'><strong>Analytics</strong></td></tr>");
		});
		
		$('#out').click(function(){
			$.ajax({
				url: 'logout.php',
				data: {confirm: 'copy'},
				type: 'POST',
				success: function(responce) {
					window.location = "default.php";
				},
				error: function(responce) {
					window.location = "error.php";
				}
			});
		});
		
		//menu refresh
		//home
		$('#1').click(function(){
			$('#t').html("<tr class='active_t'><td id='1'><strong>Home</strong></td></tr><tr><td id='2'><strong>Orders</strong></td></tr><tr><td id='3'><strong>Time</strong></td></tr><tr><td id='4'><strong>Analytics</strong></td></tr>");
			$('#contain').load("homei.php");
			myscr();
			console.log("1");
		});
		//orders
		$('#2').click(function(){
			$('#t').html("<tr><td id='1'><strong>Home</strong></td></tr><tr class='active_t'><td id='2'><strong>Orders</strong></td></tr><tr><td id='3'><strong>Time</strong></td></tr><tr><td id='4'><strong>Analytics</strong></td></tr><");
			$('#contain').load("orderi.php");
			myscr();
			console.log("2");
		});
		//time
		$('#3').click(function(){
			$('#t').html("<tr><td id='1'><strong>Home</strong></td></tr><tr><td id='2'><strong>Orders</strong></td></tr><tr class='active_t'><td id='3'><strong>Time</strong></td></tr><tr><td id='4'><strong>Analytics</strong></td></tr>");
			$('#contain').load("timei.php");
			myscr();
			console.log("3");
		});
		//anal
		$('#4').click(function(){
			$('#t').html("<tr><td id='1'><strong>Home</strong></td></tr><tr><td id='2'><strong>Orders</strong></td></tr><tr><td id='3'><strong>Time</strong></td></tr><tr class='active_t'><td id='4'><strong>Analytics</strong></td></tr>");
			$('#contain').load("anali.php");
			myscr();
			console.log("4");
		});
	});