<?php
ob_start();
session_start();

if($_SERVER["HTTP_HOST"]=="localhost"){

	$servername ="localhost";
	$username = "root";
	$password = "";
	$dbname = "fintracker";
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	/* // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} */ 

}

else{
		 
		$servername ="localhost";
		$username = "root";
		$password = "";
		$dbname = "fintracker";
		$conn = mysqli_connect($servername,$username,$password,$dbname);

		/* // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}  */
 	}

if (!$conn)

  {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
 
 
 
 
 
//------------------generating base url so header can be include in subfolder ---
$url = $_SERVER['REQUEST_URI']; //returns the current URL
 $parts = explode('/',$url);
 
$dir = $_SERVER['SERVER_NAME'];
 
 for ($i = 0; $i < count($parts) - 1; $i++) {
	$dir .= $parts[$i] . "/";
 }
 
 if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $protocol = 'http://';
} else {
    $protocol = 'https://';
}

  $baseUrl =  $protocol . $dir ;
//------------------------------
 

?>

 
 