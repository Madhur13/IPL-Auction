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
 $query = "select player_name,name,count(runs) as numb from (select player_name,team.name,sum(runs)as
runs from players,batsman,playsfor,team where players.id=batsman.player_id and batsman.year=2015
and players.id=playsfor.player_id and playsfor.team_id=team.id group by
player_name,match_id,inning,team.name having sum(runs) between 50 and 99)as X group by player_name,name order by numb desc";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<br/><center><table cellpadding = '10'>
 <tr>
 <th>NAME</th>
 <th>TEAM</th>
 <th>HALF CENTURIES</th>
 </tr>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
	
 echo '<tr>
 <td align="center">' .$row[ 'player_name' ]. '</td>
 <td align="center">' .$row['name']. '</td>
 <td align="center">&nbsp&nbsp&nbsp&nbsp' .$row[ 'numb' ].'</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>