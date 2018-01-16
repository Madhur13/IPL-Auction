<html>
<head>
	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
<title>
Players
</title>
</head>
<body>
<header>
	<div class="wrap-header zerogrid">
		<div class="row">
			<div id="cssmenu">
				<ul>
				   <li class='active'><a href="index.php">HOME</a></li>
				   <li class='active'><a href="squad.html">THE SQUAD</a></li>
				   
				</ul>
			</div>
			<a href='index.php' class="logo"><img src="images/logo.png" /></a>
		</div>
	</div>
</header>
<br>
<br>

<center>
<div style="box-shadow: 10px 10px 10px 10px; width:90%; border-radius:30px;  background:linear-gradient(-90deg,#1388F5,#5BB2E1);">
<br >
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
echo'
<form action="display.php" method="post">

	<table width="90%" cellpadding="10" cellspacing="10">
	<tr>
		<th colspan=4 ><h1 style="color:white;"><i>
		'.$team_name.'
		</i></h1></th>

	</tr>
';
$c=0;
while($row=mysqli_fetch_assoc($result))
{
	$c++;

	$player_id=$row['player_id'];
	$player_name=$row['player_name'];
	//getting image
	$image="<img src='player_images/$player_id.jpg' width=120 height=120 style=' float:left; border-radius:40px;'/><br>";
	if((($c-1)%3)==0)
	{
	echo "<tr>";
	}
	/*echo"	<td  class='t2'><center><td valign='middle'>

			<input type='radio' name='player_name' value='".$player_name."' style='height:20px; width:20px;'/>
			</td>
			<td class='t2'><center>".$image."</center></td>
			<td valign='middle' class='t2'><center><h3><i>".$player_id."</i></h3></center></td>
			<td valign='middle' class='t2'><center><h3><i>".$player_name."<i></h3></center></td></center></td>";*/
	echo"	<td class='t2' >
			
			<input style='float:left; height:20px; width:20px;' type='radio' name='player_name' value='".$player_name."'/>
			".$image."
			<h3 style='float:left; margin-top:40px;'><i>".$player_name."<i></h3></td>";
	if($c%3==0)
	{
	echo	"</tr>
					
	";
	}
}
echo '	
		</table>
		<br>
			</div>
			<br>
				<input type="submit" value="GET DETAILS" class="tdhover" 
				style=" background-color:#353533; border-radius:8px; box-shadow:5px; color: white; padding: 15px 32px; 
				text-align:center; text-decoration: none; display: inline-block; font-size: 16px; margin-top: 10px;">
			
		
		
		</form></center>';

mysqli_close($link);



?>

<footer>
	
	<div class="wrap-footer">
		<div class="zerogrid">
			<div class="row">
				<h3>Contact</h3>
				<span>Phone / +80 999 99 9999 </span></br>
				<span>Email / info@domain.com  </span></br>
				<span>Studio / Moonshine St. 14/05 Light City </span></br>
				<span><strong>Copyright 20xx - <a href="http://www.zerotheme.com" rel="nofollow" target="_blank">Html5 Templates</a> Designed by <a href="http://www.zerotheme.com" rel="nofollow" target="_blank">ZEROTHEME</a></strong></span>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
