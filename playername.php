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
 $query = "select distinct p.player_name as player,t.name
from players p
inner join playsfor f
on f.player_id=p.id and year=2015
inner join team t
on t.id=f.team_id
order by player";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<br/><center><table border='1' cellpadding = '10'>
 <tr><th>Positions</th>
 <th>Player Name</th>
 <th>Team Name</th>
 
 </tr>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
	
 echo '<tr>
 <td>' .$i. '</td>
 <td>' .$row[ 'player' ]. '</td>
 <td>' . $row[ 'name' ]. '</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>