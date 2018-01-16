<?php
session_start();
if($_POST['match_id'] && $_POST['innings'] && $_POST['year'])	
{
$matchid=$_POST['match_id'];
$innings=$_POST['innings'];
$year=$_POST['year'];
$_SESSION['matchid']=$matchid;
$_SESSION['inning']=$innings;
$_SESSION['year']=$year;
}
header('location:register_match.php');
exit(1);

?>