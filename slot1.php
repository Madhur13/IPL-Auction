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
 $query = "select p.player_name,sum(b.runs) as total_runs from batsman b inner join players 
 p on b.player_id=p.id and b.year=2015 group by b.player_id order by total_runs desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);
 echo "<center>";
 
 echo "<table cellpadding = '10'>
 <tr><th>Position</th>
 <th> Player Name</th>
 <th>Score</th>
 </tr>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
 echo '<tr>
 <td align="center">' .$i. '</td>
 <td align="center">' . $row[ 'player_name' ]. '</td>
 <td align="center">' . $row[ 'total_runs' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 
 

 
mysqli_close($link);


?>