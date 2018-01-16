<?php 
$owner_name = $_POST['owner_name']; 
$team_name = $_POST['team_name']; 
$Email = $_POST['Email']; 
$password = $_POST['password']; 
$phone = $_POST['phone']; 
$budget = $_POST['budget']; 


$link = mysqli_connect('localhost', 'root', ''); 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'ipl'); 
if(!$db){ 
die("Unable to select database"); 
} 
$insert_in_team="insert into team(name)values('$team_name')";
mysqli_query($link,$insert_in_team) or trigger_error('error in insert in team');
$get_team_id="select id from team where name='$team_name'";
$result=mysqli_query($link,$get_team_id);
$row=mysqli_fetch_assoc($result);
$team_id=$row['id'];

$query = 'INSERT INTO `owner` 
(`owner_name`, `team_id`, `budget`) 
VALUES 
("'.$owner_name.'","'.$team_id.'",'.$budget.')'; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else
{
	$get_owner_id="select owner_id from owner where team_id='$team_id'";
	$result=mysqli_query($link,$get_owner_id);	
	$row=mysqli_fetch_assoc($result);
	$owner_id=$row['owner_id'];
	$insert_in_login="insert into login(owner_id,email,password)values($owner_id,'$Email',$password)";
	mysqli_query($link,$insert_in_login) or trigger_error('error in insert in login');
	echo 'Data inserted successfully! '; 
} 

?>
