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
 $query = "select player_name,count(ballno) as sixes from batsman,players where
players.id=batsman.player_id and runs=6 and batsman.year=2015 group by player_name order by sixes
desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);
 
 echo "<br/><center><table cellpadding = '10'>
 <tr>
 <th>NAME</th>
 <th>TEAM</th>
 <th>SIXES</th>
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
 <td align="center">&nbsp&nbsp&nbsp&nbsp' .$row[ 'sixes' ].'</td>
 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>