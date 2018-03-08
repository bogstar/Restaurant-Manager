<!DOCTYPE html>
<html lang="en">
<head>

<title>MENU</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<?php
  //Gets menu from database with price and description
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $pizzas=$myDBCON->selectDB("SELECT name, itemDescription, price FROM Item WHERE idItemType=1");
  $pastas=$myDBCON->selectDB("SELECT name, itemDescription, price FROM Item WHERE idItemType=2");
  $meats=$myDBCON->selectDB("SELECT name, itemDescription, price FROM Item WHERE idItemType=3");
  $desserts=$myDBCON->selectDB("SELECT name, itemDescription, price FROM Item WHERE idItemType=4");
  $drinks=$myDBCON->selectDB("SELECT name, itemDescription, price FROM Item WHERE idItemType=5");
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
        	<li><a href="tables.php">Tables</a></li>
        	<li><a href="about.php">About</a></li>
      	</ul>
	</div>
</nav>

<div class="container">
	  <div class="jumbotron" style="background-image: url(pictures/food-order.png); background-size:cover; color:white;">
	    <h1>Menu</h1>
	    <p>Visit us and discover variety of unique flavors which charm even the most discerning guests or <a href="index.php">SignUp</a> and order food for delivery.</p>
	  </div>

	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-5">
	    <table class="table" style="color:white">
		    <thead>
		      <tr>
		        <th>Pizza</th>
		        <th></th>
		        <th>Price</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php

		      for ($i=0; $i < sizeof($pizzas) ; $i++) 
		      { 
		      		
		      		echo "<tr>";
		        	echo "<td><i>".$pizzas[$i]['name']."</i></td>";
		        	echo "<td>".$pizzas[$i]['itemDescription']."</td>";
		        	echo "<td>".$pizzas[$i]['price']."€"."</td>";
		      		echo "</tr>";
		      		
		      }

		      ?>
		    </tbody>
	  	</table>
		<table class="table" style="color:white">
		    <thead>
		      <tr>
		        <th>Pasta</th>
		        <th></th>
		        <th>Price</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php

		      for ($i=0; $i < sizeof($pastas) ; $i++) 
		      { 
		      		
		      		echo "<tr>";
		        	echo "<td><i>".$pastas[$i]['name']."</i></td>";
		        	echo "<td>".$pastas[$i]['itemDescription']."</td>";
		        	echo "<td>".$pastas[$i]['price']."€"."</td>";
		      		echo "</tr>";
		      		
		      }

		      ?>
		    </tbody>
	  	</table>
	  	</div>
	    <div class="col-lg-7" style="color:white">
	  	<table class="table" style="color:white">
		    <thead>
		      <tr>
		        <th>Meat</th>
		        <th></th>
		        <th>Price</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php

		      for ($i=0; $i < sizeof($meats) ; $i++) 
		      { 
		      		
		      		echo "<tr>";
		        	echo "<td><i>".$meats[$i]['name']."</i></td>";
		        	echo "<td>".$meats[$i]['itemDescription']."</td>";
		        	echo "<td>".$meats[$i]['price']."€"."</td>";
		      		echo "</tr>";
		      		
		      }

		      ?>
		    </tbody>
	  	</table>	
	    <table class="table" style="color:white">
		    <thead>
		      <tr>
		        <th>Dessert</th>
		        <th></th>
		        <th>Price</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php

		      for ($i=0; $i < sizeof($desserts) ; $i++) 
		      { 
		      		
		      		echo "<tr>";
		        	echo "<td><i>".$desserts[$i]['name']."</i></td>";
		        	echo "<td>".$desserts[$i]['itemDescription']."</td>";
		        	echo "<td>".$desserts[$i]['price']."€"."</td>";
		      		echo "</tr>";
		      		
		      }

		      ?>
		    </tbody>
	  	</table>
	  	<table class="table" style="color:white">
		    <thead>
		      <tr>
		        <th>Drink</th>
		        <th></th>
		        <th>Price</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php

		      for ($i=0; $i < sizeof($drinks) ; $i++) 
		      { 
		      		
		      		echo "<tr>";
		        	echo "<td><i>".$drinks[$i]['name']."</i></td>";
		        	echo "<td>".$drinks[$i]['itemDescription']."</td>";
		        	echo "<td>".$drinks[$i]['price']."€"."</td>";
		      		echo "</tr>";
		      		
		      }

		      ?>
		    </tbody>
	  	</table>
	    </div>
	  </div>
	</div>
</div>

</body>
</html>
