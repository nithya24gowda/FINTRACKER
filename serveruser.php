<?php
  session_start();
  // initialize variables
  $user_id= "";
  $user_name = "";
  $edit_state = false;
  // connect to database
  $db = mysqli_connect('localhost','root','','configuration');
  
  // if save button is clicked
  if(isset($_POST['save'])) {
	$user_id = $_POST['user_id'];
	$user_name=$_POST['user_name'];
	
	$query = "insert into user (user_id,user_name) VALUES ('$user_id', '$user_name')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "address saved";
	header('location: configurationuser.php'); // redirect to index page after insertion
	}
	
	// update records
	if(isset($_POST['update'])) {
		$user_id= mysql_real_escape_string($_POST['user_id']);
		$user_name= mysql_real_escape_string($_POST['user_name']);
		mysqli_query($db, "UPDATE user SET user_id='$user_id',user_name='$user_name' WHERE user_id=$user_id");
		$_SESSION['msg'] = "address updated";
		header('location:configurationuser.php');
	}
	// delete records
	if (isset($_GET['del'])) {
		$user_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM user WHERE user_id=$user_id");
		$_SESSION['msg'] ="address deleted";
		header('location: configurationuser.php');
	}
	// retrive records
	$results = mysqli_query($db, "SELECT * FROM user");
?>