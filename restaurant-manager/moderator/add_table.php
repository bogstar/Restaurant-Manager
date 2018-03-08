<!DOCTYPE html>
<html lang="en">
<head>

<title>ADD TABLE</title>

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

	$moderatorid=$_POST['moderatorid'];
	$tableCapacity=$_POST['tableCapacity'];
	$tablePosition=$_POST['tablePosition'];

	$myDBCON->insertDB("INSERT INTO FoodTable (idFoodTable, idPosition, capacity) 
		VALUES ('', '".$tablePosition."', '".$tableCapacity."');");

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
	  <div class="jumbotron" style="background-image: url(../pictures/table-reservation.png); background-size:cover; color:white;">
	    <h1>Table Added Successfully</h1>
	    <p>Table for <i><?echo $tableCapacity;?></i> added to restaurant!</p> 
	  </div>
	</div>
</body>
</html>