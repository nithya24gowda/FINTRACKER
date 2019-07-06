<?php
  session_start();
  // initialize variables
  $project_id= "";
  $allocation = "";
  $costing_id= "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','fintracker');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$project_id = $_POST['project_id'];
	$allocation=$_POST['allocation'];
	$costing_id=$_POST['costing_id'];
	$query = "insert into project_costing (project_id,allocation,costing_id) VALUES ('$project_id', '$allocation','$costing_id')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: project_costing.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$project_id= mysql_real_escape_string($_POST['project_id']);
		$allocation= mysql_real_escape_string($_POST['allocation']);
		$costing_id= mysql_real_escape_string($_POST['costing_id']);

		mysqli_query($db, "UPDATE project_costing SET project_id='$project_id',allocation='$allocation',costing_id='$costing_id' WHERE project_id=$project_id");
		$_SESSION['msg'] = "address updated";
		header('location:project_costing.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$project_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM project_costing WHERE project_id=$project_id");
		$_SESSION['msg'] ="address deleted";
		header('location: project_costing.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM project_costing");
?>