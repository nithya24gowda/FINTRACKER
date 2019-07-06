<?php
  session_start();
  // initialize variables
  $costing_id= "";
  $costing_name = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$costing_id = $_POST['costing_id'];
	$costing_name=$_POST['costing_name'];
	
	$query = "insert into costing (costing_id,costing_name) VALUES ('$costing_id', '$costing_name')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: configurationcosting.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$costing_id= mysql_real_escape_string($_POST['costing_id']);
		$costing_name= mysql_real_escape_string($_POST['costing_name']);
		mysqli_query($db, "UPDATE costing SET costing_id='$costing_id',costing_name='$costing_name' WHERE costing_id=$costing_id");
		$_SESSION['msg'] = "address updated";
		header('location:configurationcosting.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$costing_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM costing WHERE costing_id=$costing_id");
		$_SESSION['msg'] ="address deleted";
		header('location: configurationcosting.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM costing");
?>