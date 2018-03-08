<!DOCTYPE html>
<html lang="en">
<head>

<title>PREVIEW</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php

	require_once 'controller/dbcon.php';
	$myDBCON = new DBCON("127.0.0.1","restoran","root","");
	$myDBCON->connect();
	$deliveryBoy=$myDBCON->selectDB("SELECT idDeliveryBoy FROM DeliveryBoy ORDER BY rand() LIMIT 1");	

	$arr=$_POST;
	$keys = array_keys($arr);
	$items = "";

	for ($i=0; $i<sizeof($keys)-1; $i++) 
	{ 
		$items=$items.$arr[$keys[$i]].",";
	}

	$items=rtrim($items, ",");
	$itemsName=$myDBCON->selectDB("SELECT name,price FROM Item WHERE idItem IN (".$items.");");
	$itemsPrice=$myDBCON->selectDB("SELECT SUM(price) FROM Item WHERE idItem IN (".$items.");");

	$result=$myDBCON->selectDB("SELECT name, surname, mobileNumber, address FROM Customer WHERE idCustomer='".$arr['customerid']."'");
	
?>
</head>
<body>
	<!-- Navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<?echo "<a class='navbar-brand' href='customer_panel.php?id=".$arr['customerid']."'>BACK</a>";?>	      
	    </div>   
	  </div>
	</nav>
	<div class="container col-lg-6">           
	  <table class="table" style="color:white">
	    <thead>
	      <tr>
	        <th><h4>ORDER</h4></th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
		    <?php
		      for ($i=0; $i < sizeof(array_keys($itemsName)) ; $i++) 
		      { 		      		
		      		echo "<tr>";
		        	echo "<td><i>".$itemsName[$i]['name']."</i></td>";
		        	echo "<td>".$itemsName[$i]['price']."€"."</td>";
		      		echo "</tr>";		      		
		      }
		    ?>
		</tbody>
		<tfoot>
		  <tr>
		    <td><b>TOTAL</b></td>
		    <td><b><?echo $itemsPrice[0]['SUM(price)'];?>€</b></td>
		  </tr>
		</tfoot>  
	  </table>
	</div>
	<div class="container col-lg-6">        
		<form class="form-horizontal" role="form" style="color:white" action="order_confirmation.php" method="post">
		  <h4>ORDER DETAILS</h4>
		  <hr>   
		  <div class="form-group">
		    <label class="control-label col-lg-2" for="name">Name:</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" name="name" value="<?echo $result[0]['name'];?>" readonly="readonly">
			    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-lg-2" for="surname">Surname:</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" name="surname" value="<?echo $result[0]['surname'];?>" readonly="readonly">
			    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-lg-2" for="address">Address:</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" name="address" value="<?echo $result[0]['address'];?>">
			    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-lg-2" for="mobile">Mobile number:</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" name="mobile" value="<?echo $result[0]['mobileNumber'];?>" readonly="readonly">
			    </div>
		  </div>
		  <hr>
		  <input type="hidden" name="customerid" value="<?echo $arr['customerid'];?>">
		  <input type="hidden" name="deliveryboy" value="<?echo $deliveryBoy[0]['idDeliveryBoy'];?>">
		  <input type="hidden" name="items" value="<?echo $items;?>">
		  <button type="submit" class="btn-lg btn-success pull-right">ORDER</button>
		</form>
	</div>
</body>
</html>