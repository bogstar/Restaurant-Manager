<!DOCTYPE html>
<html lang="en">
<head>

<title>DELETE TABLE</title>

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

	for ($i=0; $i <sizeof($keys)-1; $i++) 
	{ 
		$myDBCON->deleteDB("DELETE FROM FoodTable WHERE idFoodTable=".$_POST[$keys[$i]]."");
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
	  <div class="jumbotron" style="background-image: url(../pictures/tables.png); background-size:cover; color:white;">
	    <h1>Deleted Successfully</h1> 
	    <p>You deleted <?echo sizeof($keys)-1;?> tables!</p>
	  </div>
	</div>
</body>
</html>