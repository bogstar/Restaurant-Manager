<!DOCTYPE html>
<html lang="en">
<head>

<title>DELETE RESERVATION</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="../styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php
	require_once '../controller/dbcon.php';
	$myDBCON = new DBCON("127.0.0.1","restoran","root","");
	$myDBCON->connect();


	$keys = array_keys($_POST);
	for ($i=0; $i<sizeof($keys)-1; $i++) 
	{ 
		$reservations=$_POST[$keys[$i]];
		$pieces = explode(",", $reservations);

		$myDBCON->deleteDB("DELETE FROM Reservation 
		WHERE idFoodTable = ".$pieces[0]." AND idCustomer = ".$pieces[1]." AND personCount = ".$pieces[2]." 
		AND reservationTime = '".$pieces[3]."' AND reservationDate = '".$pieces[4]."'");
	}
	$moderatorid=$_POST['moderatorid'];
?>
</head>
<body>
	<!-- Navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<?echo "<a class='navbar-brand' href='../moderator.php?id=".$moderatorid."'>BACK</a>";?>
	    </div>   
	  </div>
	</nav>
	<div class="container">
	  <div class="jumbotron" style="background-image: url(../pictures/restaurant.png); background-size:cover; color:white;">
	    <h1>Deleted Successfully</h1> 
	    <p>You deleted <?echo sizeof($keys)-1;?> reservations!</p>
	  </div>
	</div>
</body>
</html>