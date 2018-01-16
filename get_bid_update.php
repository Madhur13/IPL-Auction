<?php
//header('Content-Type: text/xml');
//echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ? >';
//echo '<response>';

session_start();

//$team_id=$_SESSION['team_id'];

$link=mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'ipl');
if(!$db)
{
	die('unable to select database');
}
	
	
$get_current="select * from current";
$result=mysqli_query($link,$get_current) or trigger_error('error in fetching current');
$row=mysqli_fetch_assoc($result);
$player_id=$row['player_id'];
$bid=$row['bid'];
if(!$bid)
{
	$bid='NONE';
}
$team_id=$row['team_id'];


$team_name="NONE";

$player_name_query="select player_name from players where id=$player_id";
$result=mysqli_query($link,$player_name_query)or trigger_error('error in fetching player_name');
$row=mysqli_fetch_assoc($result);
$player_name=$row['player_name'];
if($team_id)
{
	$team_name_query="select name from team where id=$team_id";
	$result=mysqli_query($link,$team_name_query) or trigger_error('error in fetching team_name');
	$row=mysqli_fetch_assoc($result);
	$team_name=$row['name'];
}

mysqli_close($link);
echo $bid.",".$team_name.",".$player_name;

//echo '</response>';
?>