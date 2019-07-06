<?php
  session_start();
  // initialize variables
  $project_id= "";
  $project_name = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$project_id = $_POST['project_id'];
	$project_name=$_POST['project_name'];
	
	$query = "insert into project (project_id,project_name) VALUES ('$project_id', '$project_name')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location:  configurationproject.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$project_id= mysql_real_escape_string($_POST['project_id']);
		$project_name= mysql_real_escape_string($_POST['project_name']);
		mysqli_query($db, "UPDATE project SET project_id='$project_id',project_name='$project_name' WHERE project_id='$project_id'");
		$_SESSION['msg'] = "address updated";
		header('location:configurationproject.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$user_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM project WHERE project_id='$project_id'");
		$_SESSION['msg'] ="address deleted";
		header('location: configurationproject.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM project");
?>