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
 echo "<table style='width:80%' border='1' cellpadding = '10'>
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