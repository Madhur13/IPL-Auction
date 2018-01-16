<?php

$team_name=$_POST['team'];
//$team_name="Mumbai Indians";

$link=mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'ipl');
if(!$db)
{
	die('unable to select database');
}
$query="select player_id,player_name from playsfor inner join players inner join team 
where team.name='$team_name' and playsfor.team_id=team.id and players.id=playsfor.player_id";

$result=mysqli_query($link,$query);
echo "
<form action='player_stats.php' method='post'>
	<table>
	<tr>
		<th>SELECT</th>
		<th>IMAGE</th>
		<th>ID</th>
		<th>NAME</th>
	</tr>
";

while($row=mysqli_fetch_assoc($result))
{
	$player_id=$row['player_id'];
	$player_name=$row['player_name'];
	//getting image
	$image="<img src='player_images/$player_id.jpg' width=100 height=100/><br>";
	
	echo "<tr>
			<td>
			<input type='radio' name='player_name' value='".$player_name."' style=' height:30px; width:30px;'/>
			</td>
			<td>".$image."</td>
			<td>".$player_id."</td>
			<td>".$player_name."</td>
		</tr>
	";
}
echo '	<tr>
		<td colspan="4">
			<center>
				<input type="submit" value="GET DETAILS" 
				style="background-color:#353533; border-radius:8px; box-shadow:5px; color: white; padding: 15px 32px; 
				text-align:center; text-decoration: none; display: inline-block; font-size: 16px; margin-top: 10px;">
			</center>
		</td>
		</tr>
		</table>
		</form>';

mysqli_close($link);


?>
