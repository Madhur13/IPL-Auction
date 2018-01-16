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
 $query = "select players.id as x,amount,player_name,playsfor.year,amount from playsfor,players,team where playsfor.player_id= players.id and 
 playsfor.team_id=team.id and playsfor.year=2016 order by amount desc ";
 //Execute query
 $result = mysqli_query($link,$query) or trigger_error('query failed');
 $i=1;
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
	<tr><th>Team Name</th>
	<th> Player Name</th>
	<th>AMOUNT</th>
	</tr>";
		 //echo 'player_images/'.$row["p.id"].'.jpg';
	 }
	 $c=0;
	 $pl=$row[ 'player_name' ];
	 $que="select t.name
from team t
inner join playsfor p
on p.team_id=t.id and p.year=2016
inner join players pl
on pl.id=p.player_id and pl.player_name='$pl'";
 $r = mysqli_query($link,$que);
 $ro =mysqli_fetch_assoc($r);
 echo '<tr>
 <td align="center">' .$ro['name']. '</td>
 <td align="center">' . $pl. '</td>
 <td align="center">' . $row[ 'amount' ]. '</td>

 </tr>';
	$i++;
 }
 echo '</table>' ; 
 

?>