<?php
  session_start();
  // initialize variables
  $dept_id= "";
  $dept_name = "";
  $org_id= "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$dept_id = $_POST['dept_id'];
	$dept_name=$_POST['dept_name'];
	$org_id = $_POST['org_id'];
	$query = "insert into department (dept_id,dept_name,org_id) VALUES ('$dept_id', '$dept_name','$org_id')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: configurationdepartment.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$dept_id= mysql_real_escape_string($_POST['dept_id']);
		$dept_name= mysql_real_escape_string($_POST['dept_name']);
		$org_id= mysql_real_escape_string($_POST['org_id']);
		mysqli_query($db, "UPDATE department SET dept_id='$dept_id',dept_name='$dept_name' WHERE dept_id=$dept_id");
		$_SESSION['msg'] = "address updated";
		header('location:configurationdepartment.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$user_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM department WHERE dept_id=$dept_id");
		$_SESSION['msg'] ="address deleted";
		header('location: configurationdepartment.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM department");
?>