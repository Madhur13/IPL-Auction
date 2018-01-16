
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
	
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/jquery183.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    
    
</head>
<body>
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

<section id="container">
	<div class="wrap-container">
		<section class="content-box box-1">
			<div class="zerogrid">
				
				<div class="row"><!--Start Box-->
					<div class="col-1-2">
						<div class="wrap-col item">
							
							<div class="item-content">
								<span><h1>BATSMAN'S DATA</h1></span><br><br>
								<marquee behavior="scroll" direction="up">
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
 $query = "select A.player_name,runs/balls*100 as strike_rate from (select sum(runs)as
runs,player_name from batsman inner join players where batsman.player_id=players.id and
batsman.year=2015 group by player_id )as A, (select sum(balls)as balls,player_name from ballsfaced
inner join players where ballsfaced.player_id=players.id and ballsfaced.year=2015 group by player_id )as
B where A.player_name=B.player_name order by strike_rate desc
LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);
 echo "<center><h1>TOP STRIKE RATE</h1>";
 echo "<table  cellpadding = '10'>
 <tr><th>Positions</th>
 <th>Player Name</th>
 <th>Top Strike Rate</th>
 </tr><br/>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
 echo '<tr>
 <td>' .$i. '</td>
 <td>' . $row[ 'player_name' ]. '</td>
 <td>' . $row[ 'strike_rate' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>
								</marquee>
								<a class="btn" href="single.html">More Details</a>
							</div>
						</div>
					</div>
					<div class="col-1-2">
						<div class="wrap-col item">
							
							<div class="item-content">
								<span><h1>BOWLER'S DATA</h1></span><br><br>
								<marquee behavior="scroll" direction="up">
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
 $query = "select matches.*,C.inning,C.runs,C.wicket from matches inner join (select
A.match_id,A.inning,runs1+runs2 as runs, wicket from (select match_id,inning,sum(runs)as runs1 from
batsman group by match_id,year,inning)as A, (select match_id,inning,sum(runs)as runs2 from extras
group by match_id,year,inning)as B, (select match_id,inning,count(ballno)as wicket from wickets group
by match_id,inning)as F where A.match_id=B.match_id and B.match_id=F.match_id and
A.inning=B.inning and B.inning=F.inning)as C where matches.id=C.match_id order by runs desc LIMIT
0, 10 ";
 //Execute query
 $result = mysqli_query($link,$query);
 echo "<center><h1>TOP SCORES </h1>";
 echo "<table border='1' cellpadding = '10'>
 <tr><th>Positions</th>
 <th>Match</th>
 <th>Venue</th>
 <th>Winner</th>
 <th>Score</th>
 </tr>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
	 $a=$row['team1'];
	 $b=$row['team2'];
	 $c=$row['winner'];
	 $que1="select name from team where id=$a";
	  $res1 = mysqli_query($link,$que1);
	$row1 =mysqli_fetch_assoc($res1);
	$que2="select name from team where id=$b";
	  $res2 = mysqli_query($link,$que2);
	$row2 =mysqli_fetch_assoc($res2);
	$que3="select name from team where id=$c";
	  $res3 = mysqli_query($link,$que3);
	$row3 =mysqli_fetch_assoc($res3);
 echo '<tr>
 <td>' .$i. '</td>
 <td>' . $row1[ 'name' ].' <b>vs</b> '.$row2[ 'name' ].'</td>
 <td>' . $row[ 'venue' ]. '</td>
 <td>' . $row3[ 'name' ]. '</td>
  <td>' . $row[ 'runs' ].'/'.$row['wicket']. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 mysqli_close($link);

?>
								</marquee>
								<a class="btn" href="single.html">More Details</a>
							</div>
						</div>
					</div>
										</div>
				</div>
			</div>
		</section>

		<section id="container">
	<div class="wrap-container">
		<section class="content-box box-1">
			<div class="zerogrid">
				
				<div class="row"><!--Start Box-->
					<div class="col-1-3">
						<div class="wrap-col item">
							
							<div class="item-content">
								<span><h1>BATSMAN'S DATA</h1></span><br><br>
								<marquee behavior="scroll" direction="up">





								<p>His primis omittam intellegat cu, voluptua appetere mea ad, eu harum oporteat vix. 
								Et vel quod legimus, graeci electram ocurreret at his. Vix at tation facete impetus omnesque ius harum antiopam.</p>
								</marquee>
								<a class="btn" href="single.html">More Details</a>
							</div>
						</div>
					</div>
					<div class="col-1-3">
						<div class="wrap-col item">
							
							<div class="item-content">
								<span><h1>BOWLER'S DATA</h1></span><br><br>
								<marquee behavior="scroll" direction="up">
								<p>His primis omittam intellegat cu, voluptua appetere mea ad, eu harum oporteat vix. 
								Et vel quod legimus, graeci electram ocurreret at his. Vix at tation facete impetus omnesque ius harum antiopam.</p>
								</marquee>
								<a class="btn" href="single.html">More Details</a>
							</div>
						</div>
					</div>
					<div class="col-1-3">
						<div class="wrap-col item">
							
							<div class="item-content">
								<span><h1>OVERALL PERFORMANCE</h1></span><br><br>
								<marquee behavior="scroll" direction="up">
								<p>His primis omittam intellegat cu, voluptua appetere mea ad, eu harum oporteat vix. 
								Et vel quod legimus, graeci electram ocurreret at his. Vix at tation facete impetus omnesque ius harum antiopam.</p>
								</marquee>
								<a class="btn" href="single.html">More Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<footer>
	
	<div class="wrap-footer">
		<div class="zerogrid">
			<div class="row">
				<h3>Contact</h3>
				<span>Phone / +80 999 99 9999 </span></br>
				<span>Email / info@domain.com  </span></br>
				<span>Studio / Moonshine St. 14/05 Light City </span></br>
				<span><strong>Copyright 20xx - <a href="http://www.zerotheme.com" rel="nofollow" target="_blank">Html5 Templates</a> Designed by <a href="http://www.zerotheme.com" rel="nofollow" target="_blank">ZEROTHEME</a></strong></span>
			</div>
		</div>
	</div>
</footer>
</body>
</html>