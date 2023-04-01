<?php

$servername = "localhost";
$username = "root";
$password = "password123";
$dbname = "dblab8";

// Create connection
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
    header('Location: index.php');
}

$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from userdata where email = '$email'"); 
$row = mysqli_fetch_array($result);

$Fname = $row["first_name"];
$Lname = $row["last_name"];



if(isset($_POST["DELETE_ACCOUNT"])){
    echo '<script language="javascript">window.location = "http://localhost/DBMS/delete.php";</script>';

}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>

<style>
body{
	background-color: #2980b9;
	margin: 0;
	padding: 0;
	background-image: radial-gradient(#ffd400 5px,transparent 5px);
	background-size: 50px 50px;
    font-family: Arial, sans-serif;
    font-size: 16px;
}

.heading {
  margin-top: 200px;
}

.top {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 20px;
}

h1{
    font-size: 40px;
    color: #fff;
    text-align: center;
}

label{
    font-size: 17px;
    color: #fff;
}

input{
    font-size: 17px;
    padding: 8px;
    border: none;
    border-radius: 5px;
    margin-top: 10px;
}

a{
    font-size: 20px;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    background-color: #34495e;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-right: 10px;
}

a:hover{
    background-color: #2c3e50;
}

.button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #c0392b;
}

center{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}
</style>


<body>
    <center>
        <p class="heading">
            <h1><?php echo "Hello ".$Fname.' '.$Lname; ?></h1>
        </p>

        <p class="top">
            <a href="profile.php">Profile Details</a>
            <a href="update.php">Update Profile</a>
            <a href="logout.php">Log out</a>
        </p>

        <form method="post">
            <input type="submit" name="DELETE_ACCOUNT" class="button" value="DELETE ACCOUNT" />
        </form>
    </center>
</body>
</html>

