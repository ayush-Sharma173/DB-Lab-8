<?php
require 'config.php';
session_start();

if(!isset($_SESSION['sess_user'])){
    header('Location: index.php'); 
}

$email = $_SESSION['sess_user'];

if(isset($_POST["Yes"])){

$query = "delete from userdata where email = '$email'";
$result = mysqli_query($conn, $query);

if($result){
    echo '<script type="text/javascript">alert("Account Deleted Succesfully!")</script>';
    echo '<script language="javascript">window.location = "http://localhost/DBMS/login.php";</script>';
}
else{
    echo '<script type="text/javascript">alert("Error!")</script>';
}
}


if(isset($_POST["No"])){
    echo '<script language="javascript">window.location = "http://localhost/DBMS/after_login_menu.php";</script>';

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<style>
		p.heading {
		  margin-top: 200px;
		}

		p.top {
		  margin-top: 20px;
		  margin-bottom: 20px;
		  font-size: 20px;
		}

		h1{
		    font-size: 40px;
		}

		label{
		    font-size: 20px;
		}
		input{
		    font-size: 20px;
		}

		a{
		    font-size: 20px;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}

		input[type="submit"] {
			font-size: 20px;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: white;
			margin: 5px;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>

<body>
    <center>
        <p class="heading">
        	<h1>Logout</h1>
        </p>

        <p class="top">
			Are you sure you want to delete your account?
		</p>

		<form method="post">
			<input type="submit" name="Yes" value="Yes, Delete My Account!" />
			<input type="submit" name="No" value="No, Take me Back!" />
		</form>

		<p>
        	<a href="login.php">Back to Login</a>
        </p>
    </center>
</body>
</html>

