
<html>
<body>

<div align=right style="background-color:yellow">
<h2>
<input type="text" id="txt"> seconds remaining!!!!!.......</h2>
</div>
<h1 align= center> WELCOME TO LIVE AUCTION</H1>

<center>
<p>START BIDDING </p>
WITH BASE PRICE 10 LACKS.</p> <br><br>



<form action='bid_placed.php' method='post'>
<table border=3 cellpadding=5 >
<th>Player name
<th>Current bid
<th>Bidding Team
<tr>

<td>
<?php
session_start();

//$team_id=$_SESSION['team_id'];

$team_id=$_SESSION['team_id'];
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
$db_time=$row['time']-time();


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
echo $player_name;
?>
</td>

<td>
<?php
echo $bid;
?>
</td>
<td>
<?php
echo $team_name;
?>
</td>
</table>
<br><br><br>



<p>ENTER YOUR RAISE AMOUNT</P>

<input type="number" name="amount"><br><br>
<input type="submit" value="place bid"><br>
<button onclick="increase()">SUBMIT</button>
</form>
<script>
var myVar;
var n=<?php echo $db_time; ?>;
var c;
var t;
var timer_is_on = 0;


reload_var=setInterval('reload()',7000);
help_var=setInterval('helper()',4000);

function helper()
{
	document.getElementById.innerHTML('help')="hello";
	
}



function reload()
{
	window.location='auction.php';
}


c=n+5;
    if (!timer_is_on) {
        timer_is_on = 1;
        timedCount();
		}
		
    myVar = setInterval('alertFunc()', 1000);

function timedCount() {
if(c<=0)setTimeout('Redirect()',1);
    document.getElementById("txt").value = c;
    c = c - 1;
	
    t = setTimeout(function(){ timedCount() }, 1000);
}

function timer(){

 c=n+5;
    if (!timer_is_on) {
        timer_is_on = 1;
        timedCount();
		}
		

  
				}

function alertFunc() {

 
//window.location="auction2.php";

 if(c<=0)setTimeout('Redirect()',1);
   n-=1;
}


function increase() {
  n=10;c=n+5;
  window.location= "bid_placed.php";
}

function Redirect() {
               window.location="change_auction_player.php";
			        }
					
 </script>

 

<p align='bottom' id='help'>hbvhbhjbhbvhjbvhjbv</p>



 
 <?php
 /*
 


	if(!$db)
	{
	die('unable to select database');
	}
	$get_current="select * from current";
	$result=mysqli_query($link,$get_current) or trigger_error('error in fetching current');
	$row=mysqli_fetch_assoc($result);
	$new_bid=$row['bid'];
	if($new_bid != $bid)
	{
		header('location:auction2.php');
		exit(1);
	}


mysqli_close($link);
*/
?>
 
</body>

</html>















