<?php
  session_start();
  // initialize variables
  $org_id= "";
  $allocation = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','fintracker');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$org_id = $_POST['org_id'];
	$allocation=$_POST['allocation'];
	
	$query = "insert into org_alloc (org_id,allocation) VALUES ('$org_id', '$allocation')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: org_alloc.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$org_id= mysql_real_escape_string($_POST['org_id']);
		$allocation= mysql_real_escape_string($_POST['allocation']);
		mysqli_query($db, "UPDATE org_alloc SET org_id='$org_id', allocation='$allocation' WHERE org_id=$org_id");
		$_SESSION['msg'] = "address updated";
		header('location:org_alloc.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$org_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM org_alloc WHERE org_id=$org_id");
		$_SESSION['msg'] ="address deleted";
		header('location: org_alloc.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM org_alloc");
?>