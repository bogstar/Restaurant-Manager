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

<!-- Navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    	<?echo "<a class='navbar-brand' href='customer_panel.php?id=".$_POST['customerid']."'>BACK</a>";?>
    </div>   
  </div>
</nav>
</head>
<body>

<?php
	require_once 'controller/dbcon.php';
	$myDBCON = new DBCON("127.0.0.1","restoran","root","");
	$myDBCON->connect();	

	$idCustomer=$_POST['customerid'];
	$personCount=$_POST['personCount'];
	$reservationTime=$_POST['time'];
	$reservationDate=$_POST['date'];
	$position=$_POST['position'];

	$result=$myDBCON->selectDB("SELECT surname FROM Customer WHERE idCustomer='".$idCustomer."'");
  	$surname=$result[0]['surname'];

	$startT=$reservationTime;
	$endT=date('H:i', (strtotime($startT) + 7200));

	$T=date('H:i', (strtotime($startT) - 3600));

	//Pronade slobonde stolove u zadanom terminu za zadani broj osoba i lokaciju
    $result=$myDBCON->selectDB
    ("
    	SELECT * FROM FoodTable WHERE idFoodTable NOT IN
    	(SELECT idFoodTable FROM Reservation WHERE
	    (reservationTime BETWEEN '".$T."' AND '".$endT."') 
	    AND 
	    (reservationDate = '".$reservationDate."'))
    	AND capacity='".$personCount."' AND idPosition='".$position."'
    	LIMIT 1
    ");
    //Provjera dali ima stolova
    if (empty($result)) 
    {
    	echo '
	    <div class="container">
		  <div class="jumbotron" style="background-image: url(pictures/table-reservation.png); background-size:cover; color:white;">
		    <h1 style="color:red;">Reservation unsuccessful</h1>
		    <p>
		';      
    	echo "Why dont you try different time.</br>Here is the timetable when our ".$personCount." person tables are occupied:";
    	echo "</br>";
    	$zauzetaVremena=$myDBCON->selectDB
	    ("
	    	select distinct reservationTime from Reservation natural join FoodTable 
			where idPosition='".$position."' AND capacity='".$personCount."' AND reservationDate='".$reservationDate."';
	    ");
	    for ($i=0; $i <sizeof($zauzetaVremena) ; $i++) 
	    { 
	    	echo date('H:i', (strtotime($zauzetaVremena[$i]['reservationTime'])));
	    	echo "---";
	    	echo date('H:i', (strtotime($zauzetaVremena[$i]['reservationTime']) + 7200));
	    	echo "</br>";
	    }
	    echo '
	    	</p>
	    	</div>
		</div>
	    ';
    }
    else
    {
    $idFreeTable=$result[0]['idFoodTable'];
    //Unos rezervacije u bazu
    $myDBCON->insertDB("INSERT INTO Reservation (idFoodTable,idCustomer,personCount,reservationTime,reservationDate)
    VALUES 
    ('.$idFreeTable.','.$idCustomer.','.$personCount.',CAST('". $reservationTime ."' AS TIME),CAST('". $reservationDate ."' AS DATE))");
    echo '
	    <div class="container">
		  <div class="jumbotron" style="background-image: url(pictures/table-reservation.png); background-size:cover; color:white;">
		    <h1 style="color:green;">Reservation successful</h1>
		    <p>
		';      
    echo "Table for ".$personCount." person reserved under name ".$surname.".</br>";
    echo "Reservation time: ".$startT." - ".$endT."</br>";
    echo "Reservation date: ".$reservationDate."</br>";
    echo "If u want to cancel your reservation contact us at: contact@dorsia.com, +1-202-555-0179";
    echo '
    		</p>
	    	</div>
		</div>
	    ';
    }
	
?>
	
</body>
</html>