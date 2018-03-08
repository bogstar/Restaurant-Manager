<!DOCTYPE html>
<html lang="en">
<head>
<title>SIGN IN</title>
</head>
<body>
<?php
  //SignIn
  //Nakon dobrog ulogiravanja prebaci te na customer_panel.php sa GET id=idCustomer
  //Nakon loseg ulogiravanja prebaci te na index.php sa GET signin=false
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $result=$myDBCON->selectDB("SELECT * FROM Customer WHERE email='".$_POST['userEmail']."'");
  if (count($result)==0) 
  {
    header('Location: index.php?signin=false');
  }
  else 
  {
  	$password=$myDBCON->selectDB("SELECT password FROM Customer WHERE email='".$_POST['userEmail']."'");
  	$password=$password[0]['password'];

  	if($password==$_POST['userPassword'])
  	{
  		$id=$myDBCON->selectDB("SELECT idCustomer FROM Customer WHERE email='".$_POST['userEmail']."'");
  		$id=$id[0]["idCustomer"];
    	header('Location: customer_panel.php?id='.$id);
  	}
  	else
  	{
  		header('Location: index.php?signin=false');
  	}  	
  }
?>
</body>
</html>