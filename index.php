
<html lang="en">
<head>
<link rel="shortcut icon" href="images/title.jpg" type="image/png">
    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Indian Premier League</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<link href="font/material-design-icons-master/material-icons.css" rel="stylesheet">
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsiveslides.css">

	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/jquery183.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
		// You can also use "$(window).load(function() {"
		$(function () {
		  // Slideshow 
		  $("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}
		  });
		});
	</script>
    
</head>
<body>
<div class="wrap-body" >

<!--////////////////////////////////////Header-->
<header>

	<div class="wrap-header zerogrid">
		<div class="row">
			<div id="cssmenu">
				<ul>
				   <li class='active'><a href="index.php">Home</a></li>
				   <li><a href="#statistics">Trending</a></li>
				   <li><a href="squad.html">The Squad</a></li>	
				   <li><a href="loginform.php">Register/Login</a>
  					</li>

				   
				</ul>
			</div>
			<a href='index.php' class="logo"><img src="images/logo.png" /></a>
		</div>
	</div>
</header>

    
<div class="slider">
<br/>
<br/>
<CENTER>

	<!-- Slideshow -->
	<div class="callbacks_container" >
		<ul class="rslides" id="slider">
		<li>
				<img src="images/slideshow-image0.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>
				</div>
			</li>
			<li>
				<img src="images/slideshow-image1.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>
				</div>
			</li>
			<li>
				<img src="images/slideshow-image2.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>
					
				</div>
			</li>
			<li>
				<img src="images/slideshow-image3.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>				
				</div>
			</li>
			<li>
				<img src="images/slideshow-image4.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>
				</div>
			</li>
			<li>
				<img src="images/slideshow-image6.jpg" alt="">
				<div class="caption">
					<h1 style="font-family: Monotype Corsiva"><i>Indian Premier League</i></h1>
				</div>
			</li>
		</ul>
	</div>
	<div class="clear"></div>


<!--////////////////////////////////////Container-->
<section id="container">
	<div class="wrap-container">
		<section class="content-box box-1">
			<div class="zerogrid">
				<div class="header">
					<h2 class="heading">
					<a name="statistics"></a>
						<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trending&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					</h2>
				</div>
				<div class="row"><!--Start Box-->
					<div class="col-1-3">
						<div class="wrap-col item">
							<div class="zoom-container">
							
								<!--<div style="background-image:url(images/banner-img1.jpg)">-->
								<div class="double"><img src="images/banner-img1.jpg" width="100" height="100">
										<?php
 //Connect to mysql server
  $link = mysqli_connect('localhost' , 'root', '');
 //Check link to the mysql server
 if(! $link){
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link, 'ipl');
 if(! $db){
 die("Unable to select database");
 }

 //Prepare query
 $query = "select b.player_id as x,p.player_name,sum(b.runs) as total_runs from batsman b inner join players 
 p on b.player_id=p.id and b.year=2015 group by b.player_id order by total_runs desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);

 
$i=1;
 //Show the rows in the fetched resultset one by one
 $c=1;
 while ($row =mysqli_fetch_assoc($result))
 {
	 if($c==1)
	 {
		 echo'<div id="d2"><img src="'.'player_images/'.$row["x"].'.jpg'.'"></div>
								</div>
								
							</div>
							<div class="item-content">
							
								<span><h1>ORANGE CAP</h1></span><br><br>';
		echo "<table cellpadding = '10'>
	<tr><th>Positions</th>
	<th> Player Name</th>
	<th>Total Runs</th>
	</tr>";
		 //echo 'player_images/'.$row["p.id"].'.jpg';
	 }
	 $c=0;;
 echo '<tr>
 <td align="center">' .$i. '</td>
 <td align="center">' . $row[ 'player_name' ]. '</td>
 <td align="center">' . $row[ 'total_runs' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?></p>
							
								<a class="btn" href="batsmandetails.php">More Details</a>
							
							</div>
						</div>
					</div>
					<div class="col-1-3">
						<div class="wrap-col item">
							<div class="zoom-container">
								<div class="double"><img src="images/banner-img2.jpg" width="100" height="100"/>
								<?php
 //Connect to mysql server
  $link = mysqli_connect('localhost' , 'root', '');
 //Check link to the mysql server
 if(! $link){
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link, 'ipl');
 if(! $db){
 die("Unable to select database");
 }

 //Prepare query
 $query = "select p.id as x,p.player_name,count(b.player_id) as wicket_taken from bowler b inner join 
 wickets w on b.match_id=w.match_id and b.year=w.year and b.inning=w.inning and b.overno=w.overno 
 and b.year =2015 and w.runout=0 inner join players p on p.id=b.player_id group by p.player_name order 
 by wicket_taken desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 
 $i=1;
 //Show the rows in the fetched resultset one by one
 $c=1;
 while ($row =mysqli_fetch_assoc($result))
 {
	 if($c==1)
	 {
		 echo'<div id="d2"><img src="'.'player_images/'.$row["x"].'.jpg'.'"></div>
								</div>
								
							</div>
							<div class="item-content">
								<span><h1>PURPLE CAP</h1></span><br><br>
								

								';
		echo "<table cellpadding = '10'>
	<tr><th>Positions</th>
	<th>Player Name</th>
	<th>Wickets Taken</th>
	</tr>";
		 //echo 'player_images/'.$row["p.id"].'.jpg';
	 }
	 $c=0;;
 echo '<tr>
 <td align="center">' .$i. '</td>
 <td align="center">' . $row[ 'player_name' ]. '</td>
 <td align="center">' . $row[ 'wicket_taken' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>
								</p>
								<a class="btn" href="bowlerdetails.php">More Details</a>
							</div>
						</div>
					</div>
					<div class="col-1-3">
						<div class="wrap-col item">
							<div class="zoom-container">
								<div class="double"><img src="images/banner-img3.jpg" width="100" height="100"/>
								<?php
 //Connect to mysql server
  $link = mysqli_connect('localhost' , 'root', '');
 //Check link to the mysql server
 if(! $link){
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link, 'ipl');
 if(! $db){
 die("Unable to select database");
 }

 //Prepare query
 $query = "select players.id as x,amount,player_name,playsfor.year,amount from playsfor,players,team where playsfor.player_id= players.id and 
 playsfor.team_id=team.id and playsfor.year=2016 order by amount desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 $i=1;
 //Show the rows in the fetched resultset one by one
 $c=1;
 while ($row =mysqli_fetch_assoc($result))
 {
	 if($c==1)
	 {
		 echo'<div id="d2"><img src="'.'player_images/'.$row["x"].'.jpg'.'"></div>
								</div>
								
							</div>
							<div class="item-content">
								<span><h1>HIGHEST BIDS</h1></span><br><br>
								

								';
		echo "<table cellpadding = '10'>
	<tr><th>Team Name</th>
	<th> Player Name</th>
	<th>AMOUNT</th>
	</tr>";
		 //echo 'player_images/'.$row["p.id"].'.jpg';
	 }
	 $c=0;
	 $pl=$row[ 'player_name' ];
	 $que="select t.name
from team t
inner join playsfor p
on p.team_id=t.id and p.year=2016
inner join players pl
on pl.id=p.player_id and pl.player_name='$pl'";
 $r = mysqli_query($link,$que);
 $ro =mysqli_fetch_assoc($r);
 echo '<tr>
 <td align="center">' .$ro['name']. '</td>
 <td align="center">' . $pl. '</td>
 <td align="center">' . $row[ 'amount' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>
								<a class="btn" href="totalsolds.php">More Details</a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="btn" href="grounds.html">Venues</a>&nbsp;&nbsp;&nbsp;<a class="btn" href="khatarnak.php">HIGHEST TEAM SCORES</a>&nbsp;&nbsp;&nbsp;<a class="btn" href="batsmandetails.php">MAXIMUM 100'S</a>&nbsp;&nbsp;&nbsp;<a class="btn" href="batsmandetails.php">MAXIMUM 50'S</a>&nbsp;&nbsp;&nbsp;<a class="btn" href="batsmandetails.php">MAX 6'S</a>
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