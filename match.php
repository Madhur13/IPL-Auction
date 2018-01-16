<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
//{ 

// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'INSERT'){ 
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_SESSION['matchid'] && $_SESSION['year'] && $_SESSION['inning'] && $_POST['overno'] && $_POST['ballno'] && $_POST['player_name'] && $_POST['runs'] && $_POST['bowler_name'])){ 
echo '<h3 align="center">All the fields marked as * are compulsary.</h3>'; 
$validationFlag = false; 
exit(1);
} 
else{ 
$match_id = $_SESSION['matchid']; 
$year = $_SESSION['year']; 
$inning = $_SESSION['inning']; 
$overno = $_POST['overno']; 
$ballno = $_POST['ballno']; 
$player_name =$_POST['player_name']; 
$bowler_name = $_POST['bowler_name'];

$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'ipl'); 
if(!$db){ 
die("Unable to select database"); 
} 

$query0="select id as player_id from players where player_name='$player_name'";
$results = mysqli_query($link,$query0);
$row = mysqli_fetch_assoc($results); 

$player_id = $row['player_id']; 
$runs = $_POST['runs']; 
$extras = $_POST['extras']; 
$extraruns = $_POST['extraruns']; 
$wicket = $_POST['wicket']; 
$runout = $_POST['runout']; 

//for bowler table
$qu="select match_id,year,inning,overno from bowler where match_id=$match_id and year=$year and inning=$inning and overno=$overno";
$results2 = mysqli_query($link,$qu); 

if(!($row2 = mysqli_fetch_assoc($results2)))
{
$query1="select id from players where player_name ='$bowler_name'";
$results1 = mysqli_query($link,$query1);
$row1 = mysqli_fetch_assoc($results1); 

$bowler_id = $row1['id'];
$qu2="insert into bowler (match_id,year,inning,overno,player_id) values ($match_id,$year,$inning,$overno,$bowler_id)";
$res1=mysqli_query($link,$qu2);
}

//for balls faced
$l=1;
$bquery = "select * from ballsfaced where match_id=$match_id and year =$year and player_id=$player_id";
$bresult = mysqli_query($link,$bquery);
//$brow = mysqli_fetch_assoc($bresult);
if(!($brow = mysqli_fetch_assoc($bresult)))
{
	$bquery1="insert into ballsfaced (match_id,year,player_id,balls) values ($match_id,$year,$player_id,$l)";
	$bresult1=mysqli_query($link,$bquery1);
}
else{
	$bquery2="update ballsfaced set balls = balls+1 where match_id=$match_id and year =$year and player_id=$player_id";
	$bresult1=mysqli_query($link,$bquery2);
}

mysqli_close($link);
}


//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag)
{ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'ipl'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
if($runs!=0)
{

$query = "INSERT INTO `batsman` 
(`match_id`, `year`, `inning`, `overno`, `ballno`, `player_id`, `runs`) 
VALUES 
($match_id,$year,$inning,$overno,$ballno,$player_id,$runs)"; 
//Execute query 
$results = mysqli_query($link,$query); 
} 

if($extras=="yes1")
{
	$equery = "select * from extras where match_id=$match_id and year =$year and inning=$inning and overno=$overno";
	$eresult = mysqli_query($link,$equery);
		if(!($erow = mysqli_fetch_assoc($eresult)))
		{
		$equery1 = 'INSERT INTO `extras` 
	(`match_id`, `year`, `inning`, `overno`, `runs`) 
	VALUES 
	('.$match_id.', '.$year.','.$inning.','.$overno.','.$extraruns.')'; 
	//Execute query1 
	$results11 = mysqli_query($link,$equery1);
		}
		else {
			$equery2= "update extras set runs=runs+$extraruns where match_id=$match_id and year =$year and inning=$inning and overno=$overno";
			$eresults2 = mysqli_query($link,$equery2);
		}
	
}
	
	
	

if($wicket=='yes2' && $runout=='no3'){
$query22 = "INSERT INTO `wickets` ('match_id`, `year`, `inning`, `overno`, `ballno`, `player_id`, `runout`) VALUES ($match_id,$year,$inning,$overno,$ballno,$player_id,'0')"; 
//Execute query 

$results12 = mysqli_query($link,$query22); 
}




else if($wicket=='yes2' && $runout=='yes3')
	{
		$query3 = "INSERT INTO `wickets` 
(`match_id`, `year`, `inning`, `overno`, `ballno`, `player_id`, `runout`) 
VALUES 
($match_id, $year,$inning,$overno,$ballno,$player_id,'1')"; 
//Execute query 

$results = mysqli_query($link,$query3); 
	}
	
} 
}
//} 
/*
else{ 
header('location:.php'); 
exit(); 
} */
header('location:register_match.php');
exit(1);
?>
