
<html>
<head>
<link rel="shortcut icon" href="images/title.jpg" type="image/png">
   
	<meta charset="utf-8">
	<title>Insert</title>
	
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/jquery183.min.js"></script>
	
</head>
<body>

<div class="wrap-body">

<header class="bg-theme">
	<div class="wrap-header zerogrid">
		<div class="row">
			<div id="cssmenu">
				<ul>
				   <li><a href="index.php">Home</a></li>
				   <li class="active"><a href="squad.html">The Squad</a></li>
				   <li><a href="logout.php">Log Out!</a></li>
				</ul>
			</div>
			<a href="index.php" class="logo"><img src="images/logo.png" /></a>
		</div>
	</div>
</header>


<section id="container">

<br><br><br><br>
<center>

<div style=" border-radius:10px; width:60%;  background:radial-gradient(#6BB748,#509F2C,#2B7730);">
								
								<br>
								
									<?php
									session_start();
	

$matchid=$_SESSION['matchid'];
$innings=$_SESSION['inning'];
$year=$_SESSION['year'];


echo '<h1>Match Id&nbsp;:&nbsp;'.$matchid.'&nbsp;&nbsp;Innings&nbsp;:&nbsp;'.$innings.'&nbsp;&nbsp;Year&nbsp;:&nbsp;'.$year.'</h1>';



?>
								<br>
								<form name="myform" action="match.php" method="post">
								<table>
								

								<tr>
									<th>
									<h1>
									<center>
									Enter the Over Number &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									</center>
									</th>
									<td>
									<input type="text" name="overno" style=" width: 200px; height:35px; border-radius: 10px;margin-top: 10px;  " />
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									<center>
									Enter the Ball Number &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									</center>
									</th>
									<td>
									<input type="text" name="ballno" style=" width: 200px; height:35px; border-radius: 10px; margin-top: 10px;  " />
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									
									Enter the Runs &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									
									</th>
									<td>
									<input type="text" name="runs" style=" width: 200px; height:35px; border-radius: 10px; margin-top: 10px; " />
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									
									Enter the Batsman Name &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									
									</th>
									<td>
									<input type="text" name="player_name" style=" width: 200px; height:35px; border-radius: 10px; margin-top: 10px; " />
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									
									Enter the Bowler Name &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									
									</th>
									<td>
									<input type="text" name="bowler_name" style=" width: 200px; height:35px; border-radius: 10px; margin-top: 10px; " />
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									<center>
									Extras&nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									</center>
									</th>
									<td colspan=2>
									<input type="radio" name="extras" value="yes1" style="width: 20px; height: 30px; margin-top: 10px;" /><h5>YES</h5>
									</td>
									<td>
									<input type="radio" name="extras" value="no1" style="width: 20px; height: 20px; margin-top: 10px;" /><h5>NO</h5>
									</td>
								</tr>
								<tr>
									<th>
									<h1>
									
									Enter Extra Runs &nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									
									</th>
									<td>
									<input type="text" name="extraruns" style=" width: 200px; height:35px; border-radius: 10px; margin-top: 10px; " />
									</td>
								</tr>
								<tr>
									<th>	
									<h1>
									<center>
									Wicket&nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									</center>
									</th>
									<td colspan="2">
									<input type="radio" name="wicket" value="yes2" style="width: 20px; height: 20px; margin-top: 10px;" /><h5>YES</h5>
									</td>
									<td>
									<input type="radio" name="wicket" value="no2" style="width: 20px; height: 20px; margin-top: 10px;" /><h5>NO</h5>
									</td>
								</tr>
								<tr>
									<th>	
									<h1>
									<center>
									Runout&nbsp;&nbsp;&nbsp;&nbsp;
									</h1>
									</center>
									</th>
									<td colspan="2">
									<input type="radio" name="runout" value="yes3" style="width: 20px; height: 20px; margin-top: 10px;" /><h5>YES</h5>
									</td>
									<td>
									<input type="radio" name="runout" value="no3" style="width: 20px; height: 20px; margin-top: 10px;" /><h5>NO</h5>
									</td>
								</tr>


								<tr >
								
								
								<td colspan="2">
								<input type="submit" value="INSERT" name="submit" style=" float:right; background-color:#353533; border-radius:8px; box-shadow:5px; color: white; padding: 15px 32px; text-align:center; text-decoration: none; display: inline-block; font-size: 16px; margin-top: 10px; ">
								</td>
								</tr>
								</table>
								</form>
										
								
	</div>
	</center>
<br><br>
</section>
<footer>
	<div class="wrap-footer">
		<div class="zerogrid">
			<div class="row">
				<h3>Contact</h3>
				<span>Phone / +80 999 99 9999 </span></br>
				<span>Email / info@domain.com  </span></br>
				<span>Studio / Moonshine St. 14/05 Light City </span></br>
				
			</div>
		</div>
	</div>
</footer>

</div>
</body>
</html>

