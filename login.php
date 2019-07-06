<?php

include("config.php");


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']=='')
{

	$error=''; //Variable to Store error message;
	if(isset($_POST['submit']))
	{
	
		if(empty($_POST['username']) || empty($_POST['password']))
		{
		
			$error = "Username or Password is Invalid";
		}
		else
		{
		
				//Define $user and $pass
			$username=$_POST['username'];
			$password=$_POST['password'];
			$orgname=$_POST['orgname'];
			
			if((isset($_POST['username']) && $_POST['username'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
			
				
			  
				$sql = "select * from users where username = '$username' AND password = '$password'";
				
				$rs = mysqli_query($conn,$sql);
				$numRows = mysqli_num_rows($rs);
			
				if($numRows  == 1)
				{
					$row = mysqli_fetch_assoc($rs);
				 
					$_SESSION['userid'] = $row['userid'];
					
					if($row['userType']=='admin')
					{
						$_SESSION['loggedin'] = $_POST['username'];
						$_SESSION['userType'] = 'admin';				 
						header("Location:header.php");
						exit;
							
					}
					else if($row['userType']=='cxo')
					{
						$_SESSION['loggedin'] = $_POST['username'];
						$_SESSION['userType'] = 'cxo';				 
						header("Location:header.php");
						exit;
							
					}
					else if($row['userType']=='depthead')
					{
						
						$_SESSION['loggedin'] = $_POST['username'];
						$_SESSION['userType'] = 'depthead';					 
						header("Location:header.php");
						exit;
							
					}
					else if($row['userType']=='promanager')
					{
					
						$_SESSION['loggedin'] = $_POST['username'];
						$_SESSION['userType'] = 'promanager';

						
						header("Location:header.php");
						exit;
							
					} 
					
				  
				}
				else
				{
					$error = "Username or Password is Invalid";
				}
			}
		}
			//$_SESSION['loggedin'] = $_POST['username'];
			
			
			//header("Location: header.php");
			//exit;		
	} 
}


?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>Login</title>
	</head>
	<body>
		<style >
			
				body {
    background-image: url("image3.jpg");
    background-repeat:no-repeat; 
    background-position: down;
    margin-right: 20px;
	background-size: 100% 190%;
	

			}
		</style>
		<div class="header">
			<h1> FIN TRACKER </h1>
		</div>
			<div class="login">
				<h1 align="center">Login Form</h1>
				<form action="" method="post" style="text-align:center;">
				<input type="text" placeholder="Username" id="username" name="username"><br/><br/>
				<input type="password" placeholder="Password" id="password" name="password"><br/><br/>
				<input type="text" placeholder="Orgname" id="orgname" name="orgname"><br/><br/>
				<input type="submit" value="Login" name="submit">
			
				<span><?php echo $error ?></span>
			</div>

	</body>
</html>



