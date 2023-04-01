<?php
$servername = "localhost";
$username = "root";
$password = "password123";
$dbname = "dblab8";
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection 

if ($conn->connect_error) 
{
    echo "xyx";
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "connection estd";
}

require 'config.php';
session_start();

if(!isset($_SESSION['sess_user'])){
    header('Location: login.php');
}
 
$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from userdata where email = '$email'");
$row = mysqli_fetch_array($result);

$Fname = $row["fName"];
$Lname = $row["lName"];
$email = $row["email"];
?> 


<!DOCTYPE html>
<html>
<head>
	<title>Profile Details</title>
	
</head>

<style>

	body {
		background-color: #f2f2f2;
		font-family: Arial, sans-serif;
	}
	
	.heading {
		margin-top: 50px;
		margin-bottom: 30px;
		text-align: center;
	}
	
	h1 {
		color: #333;
		font-size: 36px;
		font-weight: bold;
		margin: 0;
	}
	
	table {
		border-collapse: collapse;
		margin: 0 auto;
		margin-top: 30px;
		background-color: white;
		box-shadow: 0 0 10px rgba(0,0,0,0.1);
	}
	
	table td {
		padding: 10px;
		border: 1px solid #ccc;
		font-size: 16px;
	}
	
	table td:first-child {
		font-weight: bold;
	}
	
	.top {
		margin-top: 30px;
		text-align: center;
	}
	
	a {
		color: #333;
		text-decoration: none;
		font-weight: bold;
	}
	
	a:hover {
		text-decoration: underline;
	}
	
</style>

<script>
	// Example JavaScript code to handle button click event
	document.addEventListener("DOMContentLoaded", function() {
		var backButton = document.getElementById("backButton");
		backButton.addEventListener("click", function() {
			window.location.href = "after_login_menu.php";
		});
	});
</script>
</head>
<body>
	<div class="container">
		<div class="heading">
			<h1>Profile Details</h1>
		</div>
			<table>
		<tr>
			<td><b>First Name:</b></td>
			<td><?php echo $Fname; ?></td>
		</tr>
		<tr>
			<td><b>Last Name:</b></td>
			<td><?php echo $Lname; ?></td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td><?php echo $email; ?></td>
		</tr>
	</table>

	<div class="top">
		<button id="backButton">Back to Main Menu</button>
	</div>
</div>
</body>
</html>




