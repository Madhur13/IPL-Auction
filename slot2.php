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
 $query = "select p.player_name,count(b.player_id) as wicket_taken from bowler b inner join 
 wickets w on b.match_id=w.match_id and b.year=w.year and b.inning=w.inning and b.overno=w.overno 
 and b.year =2015 and w.runout=0 inner join players p on p.id=b.player_id group by p.player_name order 
 by wicket_taken desc LIMIT 0,5";
 //Execute query
 $result = mysqli_query($link,$query);
 echo "<center>";
 echo "<table cellpadding = '10'>
 <br>";
$i=1;
 //Show the rows in the fetched resultset one by one
 while ($row =mysqli_fetch_assoc($result))
 {
 echo '<tr>
 <td align="center" >' .$i. '</td>
 <td align="center">' . $row[ 'player_name' ]. '</td>
 <td align="center">' . $row[ 'wicket_taken' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 
?>