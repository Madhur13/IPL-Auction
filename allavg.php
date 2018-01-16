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
 $query = "select A.player_name,runs/d as average from
(select player_name,sum(runs)as runs from batsman inner join players where id=player_id and batsman.year=2015 group by batsman.player_id) as A,
(select player_name,count(match_id) as d from ballsfaced inner join players where player_id=id and ballsfaced.year=2015 group by player_id)as B
where A.player_name=B.player_name
order by average desc";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 echo "<center>";
 echo "<table cellpadding = '10'>
 <tr><th>Position</th>
 <th> Player Name</th>
 <th>Average</th>
 <th>Team</th>
 </tr>";
 $i=1;
 
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
 <td align="center" >' .$i. '</td>
 <td align="center">' .$pl. '</td>
 <td align="center">' . $row[ 'average' ]. '</td>
 <td align="center">' .$ro['name']. '</td>

 </tr>';
 $i++;
 }
 echo '</table>' ; 
 
mysqli_close($link);


?>