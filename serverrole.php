<?php
  session_start();
  // initialize variables
  $role_id= "";
  $role_name = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$role_id = $_POST['role_id'];
	$role_name=$_POST['role_name'];
	
	$query = "insert into roles (role_id,role_name) VALUES ('$role_id', '$role_name')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: configurationrole.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$role_id= mysql_real_escape_string($_POST['role_id']);
		$role_name= mysql_real_escape_string($_POST['role_name']);
		mysqli_query($db, "UPDATE roles SET role_id='$role_id',role_name='$role_name' WHERE role_id=$role_id");
		$_SESSION['msg'] = "address updated";
		header('location:configurationrole.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$user_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM roles WHERE role_id=$role_id");
		$_SESSION['msg'] ="address deleted";
		header('location: configurationrole.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM roles");
?>