<?
	  require_once 'controller/dbcon.php';
	  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
	  $myDBCON->connect();
	  $result=$myDBCON->selectDB("SELECT * FROM User WHERE username='".$_POST['moderatorUsername']."'");
	  if (count($result)==0) 
	  {
	    header('Location: index.php?moderator=false');
	  }
	  else 
	  {
	  	$password=$myDBCON->selectDB("SELECT password FROM User WHERE username='".$_POST['moderatorUsername']."'");
	  	$password=$password[0]['password'];

	  	if($password==$_POST['moderatorPassword'])
	  	{
	  		$id=$myDBCON->selectDB("SELECT idUser FROM User WHERE username='".$_POST['moderatorUsername']."'");
	  		$id=$id[0]["idUser"];
	    	header('Location: moderator.php?id='.$id);
	  	}
	  	else
	  	{
	  		header('Location: index.php?moderator=false');
	  	}  	
	  }
?>