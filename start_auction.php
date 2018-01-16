<?php

session_start();
//$_SESSION['team_id']=1;
echo $_SESSION['team_id'];
header('location:auction_start_player.php');


?>