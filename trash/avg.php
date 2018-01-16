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
order by average desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 echo "<br/><center><h1>TOP AVERAGES</h1><br/>";
 echo "<table cellpadding = '10'>
 <tr><th>Position</th>
 <th> Player Name</th>
 <th>Average</th>
 </tr>";
 $i=1;
 
 while ($row =mysqli_fetch_assoc($result))
 {
 echo '<tr>
 <td align="center" >' .$i. '</td>
 <td align="center">' . $row[ 'player_name' ]. '</td>
 <td align="center">' . $row[ 'average' ]. '</td>

 </tr>';
 $i++;
 }
 echo '</table>' ; 
 

?>