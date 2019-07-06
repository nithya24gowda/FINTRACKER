<?php
  session_start();
  // initialize variables
  $project_id= "";
  $allocation = "";
  $utilization="";
  $date ="";
  $remaining="";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','fintracker');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$project_id = $_POST['project_id'];
	$allocation=$_POST['allocation'];
	$utilization=$_POST['utilization'];
	$date=$_POST['date'];
	$remaining=$_POST['remaining'];
	
	$query = "insert into project_tracker (project_id,allocation,utilization,date,remaining) VALUES ('$project_id', '$allocation','$utilization','$date','$remaining')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: project_tracker.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		
		$project_id= mysql_real_escape_string($_POST['project_id']);
		$utilization= mysql_real_escape_string($_POST['utilization']);
		$allocation= mysql_real_escape_string($_POST['allocation']);
		$date= mysql_real_escape_string($_POST['date']);
		$remaining= mysql_real_escape_string($_POST['remaining']);
		mysqli_query($db, "UPDATE project_tracker SET project_id='$project_id',allocation='$allocation' WHERE project_id=$project_id");
		$_SESSION['msg'] = "address updated";
		header('location:project_tracker.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$org_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM project_tracker WHERE project_id=$project_id");
		$_SESSION['msg'] ="address deleted";
		header('location: project_tracker.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM project_tracker");
?>