<?php
class DBCON
{
	private $servername = "";
	private $databasename = "";
	private $username = "";
	private $password = "";
	private $conn = NULL;

	function __construct($servername,$databasename,$username,$password)
	{
		$this->servername=$servername;
		$this->databasename=$databasename;
		$this->username=$username;
		$this->password=$password;
	}

	function get($value)
	{
		switch ($value) 
		{
			case 'servername':
				echo $this->servername;
				break;
			case 'databasename':
				echo $this->databasename;
				break;
			case 'username':
				echo $this->username;
				break;
			case 'password':
				echo $this->password;
				break;
			default:
				echo "Wrong argument!";
				break;
		}
	}

	function connect()
	{
		try 
		{
    		$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
    		// set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully" . "</br>"; 
	    }
		catch(PDOException $e)
	    {
		    //echo "Connection failed: " . $e->getMessage() . "</br>";
		    die();
	    }
	}

	function insertDB($queryString)
	{
		$query = $this->conn->query($queryString);
	}

	function updateDB($queryString)
	{
		$query = $this->conn->query($queryString);
	}

	function deleteDB($queryString)
	{
		$query = $this->conn->query($queryString);
	}

	function selectDB($queryString)
	{
		$query = $this->conn->query($queryString);
		$r=$query->fetchAll(PDO::FETCH_ASSOC);
		return $r;
	}
}
?>
<head>
<body>
</body>
</html>