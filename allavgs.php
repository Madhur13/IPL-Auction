<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="shortcut icon" href="images/title.jpg" type="image/png">
   
	<meta charset="utf-8">
	<title>Batsman Details</title>
	
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/jquery183.min.js"></script>
	
</head>
<body>
<div class="wrap-body">

<!--////////////////////////////////////Header-->
<header class="bg-theme">
	<div class="wrap-header zerogrid">
		<div class="row">
			<div id="cssmenu">
				<ul>
				   <li><a href="index.php">Home</a></li>
				   <li class='active'><a href="squad.html">The Squad</a></li>
				</ul>
			</div>
			<a href='index.php' class="logo"><img src="images/logo.png" /></a>
		</div>
	</div>
</header>


<!--////////////////////////////////////Container-->
<section id="container">
	<div class="wrap-container">
		<section class="content-box box-1">
			<div class="zerogrid">
			<div class="row"><!--Start Box-->
					<div class="col-1-1">
						<div class="wrap-col item">
							
							
							<div class="item-content">
								<span><center><h1>AVERAGES DETAILS</h1></center></span><br>
								
								<!-- <marquee behavior="scroll" direction="up" height="170px" scrolldelay="200"> -->
								<?php
									include('allavg.php');
								?>
								<!-- </marquee> -->
								
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</section>
	</div>
		
										
										
									
								
</section>

<!--////////////////////////////////////Footer-->
<footer>
	<div class="wrap-footer">
		<div class="zerogrid">
			<div class="row">
				<h3>Contact</h3>
				<span>Phone / +80 999 99 9999 </span></br>
				<span>Email / info@domain.com  </span></br>
				<span>Studio / Moonshine St. 14/05 Light City </span></br>
				
			</div>
		</div>
	</div>
</footer>

</div>
</body>
</html>