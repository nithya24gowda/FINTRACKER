<?php
  session_start();
  // initialize variables
  $project_id= "";
  $allocation = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','fintracker');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$project_id = $_POST['project_id'];
	$allocation=$_POST['allocation'];
	
	$query = "insert into project_alloc (project_id,allocation) VALUES ('$project_id', '$allocation')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: project_alloc.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$project_id= mysql_real_escape_string($_POST['project_id']);
		$allocation= mysql_real_escape_string($_POST['allocation']);
		mysqli_query($db, "UPDATE project_alloc SET project_id='$project_id',allocation='$allocation' WHERE project_id=$project_id");
		$_SESSION['msg'] = "address updated";
		header('location:project_alloc.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$project_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM project_alloc WHERE project_id=$project_id");
		$_SESSION['msg'] ="address deleted";
		header('location: project_alloc.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM project_alloc");
?>