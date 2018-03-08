<!DOCTYPE html>
<html lang="en">
<head>
<title>SIGN UP</title>
</head>
<body>
<?php
  //SignUp
  //Nakon dobre registracije prebaci te na index.php sa GET signup=true
  //Nakon lose registracije prebaci te na index.php sa GET signup=true
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $result=$myDBCON->selectDB("SELECT * FROM Customer WHERE email='".$_POST['userEmail']."'");
  if (count($result)==0) 
  {
      $myDBCON->insertDB("INSERT INTO Customer (idCustomer,email,password,name,surname,address,mobileNumber)
                          VALUES ('','".$_POST['userEmail']."','".$_POST['userPassword']."','".$_POST['userName']."','".$_POST['userSurname']."','".$_POST['userAddress']."','".$_POST['userNumber']."')");
      header('Location: index.php?signup=true');
  }
  else 
  {
      header('Location: index.php?signup=false');
  }
?>
</body>
</html>