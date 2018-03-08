<!DOCTYPE html>
<html lang="en">
<head>

<title>ADD ITEM</title>

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
	$itemType=$_POST['itemType'];
	$itemName=$_POST['itemName'];
	$itemDescription=$_POST['itemDescription'];
	$itemPrice=$_POST['itemPrice'];

	$myDBCON->insertDB("INSERT INTO Item (idItem, idItemType, name, itemDescription, price) 
		VALUES ('', '".$itemType."', '".$itemName."', '".$itemDescription."', '".$itemPrice."');");

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
	  <div class="jumbotron" style="background-image: url(../pictures/food-order.png); background-size:cover; color:white;">
	    <h1>Item Added Successfully</h1>
	    <p>Item <i><?echo $itemName;?></i> added to menu!</p> 
	  </div>
	</div>
</body>
</html>