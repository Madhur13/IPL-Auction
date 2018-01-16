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
player_name,match_id,inning,team.name having sum(runs)>=100)as X group by player_name,name";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 
 //Show the rows in the fetched resultset one by one
 $c=1;
 while ($row =mysqli_fetch_assoc($result))
 {
	 if($c==1)
	 {
		 echo'
							<div class="item-content">
								<br><br>
								

								';
		echo "<table cellpadding = '10'>
	<tr><th>PLAYER NAME</th>
	<th>TEAM</th>
	<th>CENTURIES</th>
	</tr>";
		
	 }
	 $c=0;
	 
 echo '<tr>
 <td align="center">' .$row[ 'player_name' ]. '</td>
 <td align="center">' .$row['name']. '</td>
 <td align="center">' .$row[ 'numb' ].'</td>

 </tr>';
	
 }
 echo '</table>' ; 
 

?>