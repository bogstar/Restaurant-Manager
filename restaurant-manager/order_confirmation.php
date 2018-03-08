<!DOCTYPE html>
<html lang="en">
<head>

<title>CONFIRM</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php

	$address=$_POST['address'];
	$idCustomer=$_POST['customerid'];
	$idDeliveryBoy=$_POST['deliveryboy'];
	$orderDate=date('Y-m-d H:i:s');
	$items = explode(",", $_POST['items']);

	require_once 'controller/dbcon.php';
	$myDBCON = new DBCON("127.0.0.1","restoran","root","");
	$myDBCON->connect();
	$myDBCON->updateDB("UPDATE Customer SET address='".$address."' WHERE idCustomer=".$idCustomer."");
	$nameDeliveryBoy=$myDBCON->selectDB("SELECT name FROM DeliveryBoy WHERE idDeliveryBoy=".$idDeliveryBoy."")[0]['name'];	

	for ($i=0; $i < sizeof($items) ; $i++) 
	{ 
		$myDBCON->insertDB("INSERT INTO FoodOrder (idItem, idDeliveryBoy, idCustomer, orderDate) 
			VALUES ('".$items[$i]."', '".$idDeliveryBoy."', '".$idCustomer."', '".$orderDate."')");
	}
	
?>
</head>
<body>
	<!-- Navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<?echo "<a class='navbar-brand' href='customer_panel.php?id=".$idCustomer."'>BACK</a>";?>
	    </div>   
	  </div>
	</nav>
	<div class="container">
	  <div class="jumbotron" style="background-image: url(pictures/food-order.png); background-size:cover; color:white;">
	    <h1>Order successful</h1> 
	    <p>Our delivery boy <? echo $nameDeliveryBoy;?> is on his way!</p> 
	  </div>
	</div>
</body>
</html>