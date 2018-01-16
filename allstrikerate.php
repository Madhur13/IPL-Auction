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
B where A.player_name=B.player_name order by strike_rate desc";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<table border='1' cellpadding = '10'>
 <tr><th>Positions</th>
 <th>Player Name</th>
 <th>Top Strike Rate</th>
 <th>Team Name</th>
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
 <td>' .$i. '</td>
 <td>' .$pl. '</td>
 <td>' . $row[ 'strike_rate' ]. '</td>
 <td>' .$ro['name']. '</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>