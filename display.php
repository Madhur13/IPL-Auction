<html>
<head>
<link rel="shortcut icon" href="images/title.jpg" type="image/png">
<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsiveslides.css">
	
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/jquery183.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
<title>
Player Details
</title>
</head>
<body>
<header>
	<div class="wrap-header zerogrid">
		<div class="row">
			<div id="cssmenu">
				<ul>
				   <li class='active'><a href="index.php">Home</a></li>
				   <li><a href="squad.html">The Squad</a></li>	
				   
				</ul>
			</div>
			<a href='index.php' class="logo"><img src="images/logo.png" /></a>
		</div>
	</div>
</header>
<br>
<br>
<br>
<center>
<div style="width:60%; box-shadow: 10px 10px 10px 10px;	 background-color:#F56614; border-radius: 20px 60px 20px 60px;">
<?php

//session_start();
$player_name=$_POST['player_name'];
//$player_name="SL Malinga";

$link=mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'ipl');
if(!$db)
{
	die('unable to select database');
}
//getting image
$player_id_query="select id from players where player_name='$player_name'";
$result=mysqli_query($link,$player_id_query);
$row=mysqli_fetch_assoc($result);
$player_id=$row['id'];
$image="<img  style='border-radius:30px; box-shadow:5px 5px 5px 5px;' src='player_images/$player_id.jpg' width='125' height='125'/><br>";
echo '<br><div style="width:50%;"><marquee style=" color:white; font-size:30px;"> '.$player_name.'</marquee></div><br><br>'.$image;

//getting strike rate
$strike_rate_query="select runs/balls*100 as strike_rate from (select sum(balls)as balls from ballsfaced inner join (select id
from players where player_name='$player_name')as A where player_id=id) as B, (select sum(runs) as
runs from batsman inner join (select id from players where player_name='$player_name')as C where
player_id=id)as D";
$result=mysqli_query($link,$strike_rate_query) or trigger_error('error in strike rate');
$row=mysqli_fetch_assoc($result);
$strike_rate=$row['strike_rate'];
if(!$strike_rate)
	$strike_rate="NIL";



//getting economy rate
$economy_query="select runs/overs as economy from (select count(overno)as overs from bowler inner join (select id from
players where player_name='$player_name')as A where player_id=id) as D, (select runs1+runs2 as runs
from (select sum(runs) as runs1 from batsman inner join bowler inner join (select id from players where
player_name='$player_name')as B where batsman.match_id=bowler.match_id and
batsman.year=bowler.year and batsman.inning=bowler.inning and batsman.overno=bowler.overno and
bowler.player_id=id) as C , (select sum(runs) as runs2 from extras inner join bowler inner join (select id
from players where player_name='$player_name')as B where extras.match_id=bowler.match_id and
extras.year=bowler.year and extras.inning=bowler.inning and extras.overno=bowler.overno and
bowler.player_id=id) as G )as F";
$result=mysqli_query($link,$economy_query) or trigger_error('error in economy rate');
$row=mysqli_fetch_assoc($result);
$economy=$row['economy'];
if(!$economy)
	$economy="NIL";



//getting wickets
$wickets_query="select count(*)as wickets from wickets inner join players inner join bowler 
where players.id=bowler.player_id and bowler.overno=wickets.overno and bowler.inning=wickets.inning and
 bowler.year=wickets.year and bowler.match_id=wickets.match_id and runout=0 and player_name='$player_name'";
$result=mysqli_query($link,$wickets_query) or trigger_error('error in wickets query');
$row=mysqli_fetch_assoc($result);
$wickets=$row['wickets'];
if(!$wickets)
	$wickets="NIL";








//getting total runs
$total_runs_query="select sum(runs)as runs from batsman inner join players where player_name='$player_name' and
batsman.player_id=players.id and batsman.year=2015";
$result=mysqli_query($link,$total_runs_query) or trigger_error('error in total_runs query');
$row=mysqli_fetch_assoc($result);
$total_runs=$row['runs'];
if(!$total_runs)
	$total_runs="NIL";

//getting runs_given
$runs_given_query="select runs1+runs2 as runs from ((select sum(runs)as runs1 from batsman inner join players
inner join bowler where player_name='$player_name' and bowler.player_id=players.id and
bowler.overno=batsman.overno and bowler.match_id=batsman.match_id and bowler.year=2015 and
bowler.inning=batsman.inning)as B, (select sum(runs)as runs2 from extras inner join players inner join
bowler where player_name='$player_name' and bowler.player_id=players.id and
bowler.overno=extras.overno and bowler.match_id=extras.match_id and bowler.year=2015 and
bowler.inning=extras.inning)as A)";
$result=mysqli_query($link,$runs_given_query) or trigger_error('error in runs_given query');
$row=mysqli_fetch_assoc($result);
$runs_given=$row['runs'];
if(!$runs_given)
	$runs_given="NIL";




//getting matches_batted
$matches_batted_query="select count(*) as d from (select distinct match_id from ballsfaced inner join players where
player_name='$player_name' and ballsfaced.year=2015 and ballsfaced.player_id=players.id union select distinct match_id from wickets
inner join players where wickets.year=2015 and player_name='$player_name' and wickets.player_id=players.id )as A";
$result=mysqli_query($link,$matches_batted_query) or trigger_error('error in matches_batted query');
$row=mysqli_fetch_assoc($result);
$matches_batted=$row['d'];
if(!$matches_batted)
	$matches_batted="NIL";

//getting no of sixes
$sixes_query="select count(runs) as sixes from (select runs from batsman inner join players where player_name='$player_name'
 and batsman.year=2015 and batsman.player_id=players.id and batsman.runs=6) as A";
$result=mysqli_query($link,$sixes_query) or trigger_error('error in no of sixes query');
$row=mysqli_fetch_assoc($result);
$sixes=$row['sixes'];
if(!$sixes)
	$sixes="NIL";


//getting no of fours
$fours_query="select count(runs) as fours from (select runs from batsman inner join players where player_name='$player_name'
 and batsman.year=2015 and batsman.player_id=players.id and batsman.runs=4) as A";
$result=mysqli_query($link,$fours_query) or trigger_error('error in no of fours query');
$row=mysqli_fetch_assoc($result);
$fours=$row['fours'];
if(!$fours)
	$fours="NIL";

//getting no of matches bowled
$matches_bowled_query="select count(*) as matches from ( select distinct match_id from bowler inner join players where
player_name='$player_name' and bowler.year=2015 and bowler.player_id=players.id )as A";
$result=mysqli_query($link,$matches_bowled_query) or trigger_error('error in matches_bowled query');
$row=mysqli_fetch_assoc($result);
$matches_bowled=$row['matches'];
if(!$matches_bowled)
	$matches_bowled="NIL";

//getting no of 100s
$hundreds_query="select count(runs) as hundreds from (select sum(runs) as runs from batsman inner join players where
player_name='$player_name' and batsman.year=2015 and players.id=batsman.player_id group by batsman.match_id)as A where
runs>=100 and runs<200";
$result=mysqli_query($link,$hundreds_query) or trigger_error('error in hundreds query');
$row=mysqli_fetch_assoc($result);
$hundreds=$row['hundreds'];
if(!$hundreds)
	$hundreds="NIL";

//getting no of 50s
$fifty_query="select count(runs) as fifty from (select sum(runs) as runs from batsman inner join players where
player_name='$player_name' and batsman.year=2015 and players.id=batsman.player_id group by batsman.match_id)as A where
runs>=50 and runs<100";
$result=mysqli_query($link,$fifty_query) or trigger_error('error in fifties query');
$row=mysqli_fetch_assoc($result);
$fifty=$row['fifty'];
if(!$fifty)
	$fifty="NIL";

//getting highest_score
$highest_score_query="select max(runs)as runs from (select sum(runs)as runs,match_id from batsman inner join
players where player_name='$player_name' and batsman.year=2015 and players.id=batsman.player_id group by match_id)as A";
$result=mysqli_query($link,$highest_score_query) or trigger_error('error in highest_score query');
$row=mysqli_fetch_assoc($result);
$highest_score=$row['runs'];
if(!$highest_score)
	$highest_score="NIL";

//getting ballsfaced
$ballsfaced_query="select sum(balls) as balls from ballsfaced inner join players where player_name='$player_name' and
ballsfaced.year=2015 and ballsfaced.player_id=players.id";
$result=mysqli_query($link,$ballsfaced_query) or trigger_error('error in ballsfaced query');
$row=mysqli_fetch_assoc($result);
$ballsfaced=$row['balls'];
if(!$ballsfaced)
	$ballsfaced="NIL";


//getting no_of _maidens
$maidens_query="select x-y as maidens from (select count(*) as x from 
players inner join bowler where player_name='$player_name' and bowler.player_id=players.id and bowler.year=2015)as A, 
(select count(*)as y from (select batsman.overno,batsman.match_id,batsman.inning from 
players inner join bowler inner join batsman 
where player_name='$player_name' and bowler.player_id=players.id and batsman.match_id=bowler.match_id and 
batsman.inning=bowler.inning and batsman.year=bowler.year and batsman.year=2015 and batsman.overno=bowler.overno
 group by batsman.match_id,batsman.inning,batsman.year,batsman.overno )as B )as C";
$result=mysqli_query($link,$maidens_query) or trigger_error('error in maidens query');
$row=mysqli_fetch_assoc($result);
$maidens=$row['maidens'];
if(!$maidens)
	$maidens="NIL";


//getting no_of _3_wickets
$wickets_3_query="select player_name,player_id,count(d) as three from (select player_name,b.player_id
,b.match_id,b.year,b.inning,count(w.ballno) as d from wickets w inner join players p inner join bowler b
where p.id=b.player_id and b.year=2015 and b.match_id=w.match_id and b.year=w.year and
b.inning=w.inning and b.overno=w.overno group by
b.player_id,b.match_id,b.year,b.inning,player_name)as A where d=3 and player_name='$player_name' group by player_id order by three
desc";
$result=mysqli_query($link,$wickets_3_query);
if($result)
{
$row=mysqli_fetch_assoc($result);
$threes=$row['three'];
}
else
	$threes=0;
if(!$threes)
	$threes="NIL";


//getting no_of _4_wickets
$wickets_4_query="select player_name,player_id,count(d) as fours from (select player_name,b.player_id
,b.match_id,b.year,b.inning,count(w.ballno) as d from wickets w inner join players p inner join bowler b
where p.id=b.player_id and b.year=2015 and b.match_id=w.match_id and b.year=w.year and
b.inning=w.inning and b.overno=w.overno group by
b.player_id,b.match_id,b.year,b.inning,player_name)as A where d=4 and player_name='$player_name' group by player_id order by fours
desc";
$result=mysqli_query($link,$wickets_4_query);
if($result)
{
$row=mysqli_fetch_assoc($result);
$fours=$row['fours'];
}
else 
	$fours=0;
if(!$fours)
	$fours="NIL";

//getting no_of _overs
$overs_query="select count(overno) as overs from bowler,players where player_name='$player_name' and player_id=id group by player_id";
$result=mysqli_query($link,$overs_query);
if($result)
{
$row=mysqli_fetch_assoc($result);
$overs=$row['overs'];
}
else 
	$overs=0;
if(!$overs)
	$overs="NIL";


//getting bowlers_best
$bowler_best_query="select W.player_name,W.match_id,W.inning,W.wickets,R.runs from 

(select player_name,b.match_id,b.inning,count(ballno)as wickets from bowler b,players p,wickets w where b.player_id=p.id and 
b.match_id=w.match_id and b.year=w.year and b.inning=w.inning and b.overno=w.overno and b.year=2015 and w.runout=0 and p.player_name='$player_name' group by player_name,match_id,inning)as W,

(select X.player_name,X.match_id,X.inning,(runs1+runs2)as runs from
(select player_name,b.match_id,b.inning,sum(runs)as runs1 from bowler b,players p,batsman bat where  b.player_id=p.id and b.match_id=bat.match_id and b.year=bat.year and b.inning=bat.inning and b.overno=bat.overno and b.year=2015 group by player_name,match_id,inning)as X,
(select player_name,b.match_id,b.inning,sum(runs)as runs2 from bowler b,players p,extras bat where  b.player_id=p.id and b.match_id=bat.match_id and b.year=bat.year and b.inning=bat.inning and b.overno=bat.overno and b.year=2015 group by player_name,match_id,inning)as Y
where X.player_name=Y.player_name and X.match_id=Y.match_id and X.inning=Y.inning and X.player_name='$player_name')as R

where W.player_name=R.player_name and W.match_id=R.match_id and W.inning=R.inning
order by wickets desc,runs asc limit 0,1";
$result=mysqli_query($link,$bowler_best_query)or trigger_error('error in bowler best query');
if($result)
{
$row=mysqli_fetch_assoc($result);
$best_wickets=$row['wickets'];
$best_runs=$row['runs'];
}
else {
	$best_wickets=0;
	$best_runs=0;
}
if(!($best_runs || $best_wickets))
{
	$best_wickets="NIL";
	$best_runs="NIL";
}



//<th colspan=3 style='float:right; color:white; font-size:20px; align:center; margin-bottom:30px;'></th>

echo "<br><table>
	<tr style='margin-bottom:20px;'>
		<th colspan=3 style='font-family:tahoma; color:white; font-size:20px; align:center;'>NAME&nbsp;&nbsp;:".$player_name."
	</th>

	</tr>
	<tr>
	<th  colspan=2 style='font-family:Comic Sans MS; background-color:white; font-size:20px; align:center;'>BATTING STATS&nbsp;&nbsp;&nbsp;&nbsp;
	</th>
	<th  colspan=2 style='font-family:Comic Sans MS; background-color:#E1D7D1;  font-size:20px; align:center;'>BOWLING STATS
	</th>
	
";

echo "
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>MATCHES
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$matches_batted."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;MATCHES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$matches_bowled."</td>
	</tr>
	
	<tr>
		<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>&nbsp;&nbsp;STRIKE RATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; align:center; background-color:white; font-size:20px;'>".$strike_rate."</td>
		<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;ECONOMY RATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$economy."</td>
		
	</tr>
	
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>TOTAL RUNS
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$total_runs."
	&nbsp;
	</td>
	
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;WICKETS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$wickets."</td>
	</tr>
	
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>100S
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$hundreds."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;BBM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$best_wickets."/".$best_runs."</td>
	</tr>
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>HIGHEST SCORE
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$highest_score."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;MAIDENS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$maidens."</td>
	</tr>
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>50s
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$fifty."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;OVERS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$overs."</td>
	</tr>
	
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>6s
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$sixes."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;3w&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$threes."</td>
	</tr>
	
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>4s
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$fours."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;4w&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$fours."</td>
	</tr>
	
	<tr>
	<th style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>BALLS FACED
	&nbsp;
	</th>
	<td style='font-family:Comic Sans MS; background-color:white; font-size:20px;'>".$ballsfaced."
	&nbsp;
	</td>
	<th style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;RUNS GIVEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<td style='font-family:Comic Sans MS; background-color:#E1D7D1; font-size:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$runs_given."</td>
	</tr>
	
	</table>
	<br><br>

";

mysqli_close($link);


?>
</center>
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