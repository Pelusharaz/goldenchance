<?php
$host = 'localhost';
$db_name = 'goldenchance';
$username = 'root';
$password ='';

try {
    //code...
    $DBH =new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
}
?>


<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $database = "goldenchance";
	private $password ='';
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>