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
 $query = "select W.player_name,W.match_id,W.inning,W.wickets,R.runs from (select
player_name,b.match_id,b.inning,count(ballno)as wickets from bowler b,players p,wickets w where
b.player_id=p.id and b.match_id=w.match_id and b.year=w.year and b.inning=w.inning and
b.overno=w.overno and b.year=2015 and w.runout=0 group by player_name,match_id,inning)as W,
(select X.player_name,X.match_id,X.inning,(runs1+runs2)as runs from (select
player_name,b.match_id,b.inning,sum(runs)as runs1 from bowler b,players p,batsman bat where
b.player_id=p.id and b.match_id=bat.match_id and b.year=bat.year and b.inning=bat.inning and
b.overno=bat.overno and b.year=2015 group by player_name,match_id,inning)as X, (select
player_name,b.match_id,b.inning,sum(runs)as runs2 from bowler b,players p,extras bat where
b.player_id=p.id and b.match_id=bat.match_id and b.year=bat.year and b.inning=bat.inning and
b.overno=bat.overno and b.year=2015 group by player_name,match_id,inning)as Y where
X.player_name=Y.player_name and X.match_id=Y.match_id and X.inning=Y.inning)as R where
W.player_name=R.player_name and W.match_id=R.match_id and W.inning=R.inning order by wickets
desc,runs asc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<br/><center><table cellpadding = '10'>
 <tr>
 <th>NAME</th>
 
  <th>TEAM</th>
 
 <th>WICKETS</th>
 <th>RUNS GIVEN</th>
 </tr>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
	 $pl=$row[ 'player_name' ];
	 $que="select t.name
from team t
inner join playsfor p
on p.team_id=t.id 
inner join players pl
on pl.id=p.player_id and pl.player_name='$pl'";
 $r = mysqli_query($link,$que);
 $ro =mysqli_fetch_assoc($r);
 echo '<tr>
 <td align="center">' .$pl. '</td>
 
 <td align="center">' .$ro['name']. '</td>
 
  <td align="center">' .$row[ 'wickets' ].'</td>
   <td align="center">' .$row[ 'runs' ].'</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>