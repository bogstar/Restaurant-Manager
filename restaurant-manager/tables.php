<!DOCTYPE html>
<html lang="en">
<head>

<title>TABLES</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<?php
  //Gets capacity and description of position from database
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $descriptions=$myDBCON->selectDB("SELECT description FROM Position");
  $capacityIN=$myDBCON->selectDB("SELECT SUM(capacity) AS a FROM FoodTable WHERE idPosition=1")[0]['a'];
  $capacityOUT=$myDBCON->selectDB("SELECT SUM(capacity) AS a FROM FoodTable WHERE idPosition=2")[0]['a'];
  $descriptionIN=$descriptions[0]['description'];
  $descriptionOUT=$descriptions[1]['description'];
?>

<body>

<!-- Navigation bar -->
<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
  		  <!-- Header Dorsia -->
		    <div class="navbar-header">
      		  <a class="navbar-brand" href="index.php">DORSIA</a>
    	  </div>
		    <!-- Links to subpages -->
      	<ul class="nav navbar-nav">
            <li><a href="menu.php">Menu</a></li>
            <li><a href="about.php">About</a></li>
      	</ul>
    </div>
</nav>

<div class="container">
  <div class="jumbotron" 
        style="background-image: url(pictures/tables.png); background-size:cover; color:white;">
    <h1>Tables</h1>
    <p>Visit us and Discover the romantic ambience and variety of unique flavors which charm even the most discerning guests. <a href="index.php">SignUp</a> to make a reservation.</p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <div class="jumbotron" 
        style="background-image: url(pictures/table-reservation.png); background-size: cover;color:white;">     
          <h1 class="text-center">Indoor</h1>
          <h4 class="text-center"><?echo $descriptionIN;?></h4>
          <h3 class="text-center">Capacity: <?echo $capacityIN;?></h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="jumbotron" 
        style="background-image: url(pictures/restaurant.png); background-size: cover;color:white;">
          <h1 class="text-center">Outdoor</h1>
          <h4 class="text-center"><?echo $descriptionOUT;?></h4>
          <h3 class="text-center">Capacity: <?echo $capacityOUT;?></h3>
        </div>
    </div>
  </div>
</div>
</body>
</html>
