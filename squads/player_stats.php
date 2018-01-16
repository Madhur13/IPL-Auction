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
$image="<img src='player_images/$player_id.jpg' width=100 height=100/><br>";
echo $image;

//getting strike rate
$strike_rate_query="select runs/balls*100 as strike_rate from (select sum(balls)as balls from ballsfaced inner join (select id
from players where player_name='$player_name')as A where player_id=id) as B, (select sum(runs) as
runs from batsman inner join (select id from players where player_name='$player_name')as C where
player_id=id)as D";
$result=mysqli_query($link,$strike_rate_query) or trigger_error('error in strike rate');
$row=mysqli_fetch_assoc($result);
$strike_rate=$row['strike_rate'];




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




//getting wickets
$wickets_query="select count(*)as wickets from wickets inner join players inner join bowler 
where players.id=bowler.player_id and bowler.overno=wickets.overno and bowler.inning=wickets.inning and
 bowler.year=wickets.year and bowler.match_id=wickets.match_id and runout=0 and player_name='$player_name'";
$result=mysqli_query($link,$wickets_query) or trigger_error('error in wickets query');
$row=mysqli_fetch_assoc($result);
$wickets=$row['wickets'];




echo "<table border='1'>
	<tr>
		<th>NAME</th>
		<th>STRIKE RATE</th>
		<th>ECONOMY RATE</th>
		<th>WICKETS</th>
	</tr>
";

echo "<tr>
		<td>".$player_name."</td>
		<td>".$strike_rate."</td>
		<td>".$economy."</td>
		<td>".$wickets."</td>
	</tr>
";

mysqli_close($link);


?>
