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
 $query = "select p.player_name,count(b.player_id) as wicket_taken from bowler b inner join wickets w on b.match_id=w.match_id and b.year=w.year and b.inning=w.inning and b.overno=w.overno and b.year =2015 and w.runout=0 inner join players p on p.id=b.player_id group by p.player_name order by wicket_taken desc";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<br/><center><table border='1' cellpadding = '10'>
 <tr><th>Positions</th>
 <th>Player Name</th>
 <th>Total Wicket Taken</th>
 <th>Team</th>
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
 <td>' . $row[ 'wicket_taken' ]. '</td>
<td>' .$ro['name']. '</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>