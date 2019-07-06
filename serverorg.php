<?php
  session_start();
  // initialize variables
  $org_id= "";
  $org_name = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$org_id = $_POST['org_id'];
	$org_name=$_POST['org_name'];
	
	$query = "insert into organisation (org_id,org_name) VALUES ('$org_id', '$org_name')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: configurationorganisation.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$org_id= mysql_real_escape_string($_POST['org_id']);
		$org_name= mysql_real_escape_string($_POST['org_name']);
		mysqli_query($db, "UPDATE organisation SET org_id='$org_id',org_name='$org_name' WHERE org_id=$org_id");
		$_SESSION['msg'] = "address updated";
		header('location: configurationorganisation.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$org_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM organisation WHERE org_id=$org_id");
		$_SESSION['msg'] ="address deleted";
		header('location:  configurationorganisation.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM organisation");
?>