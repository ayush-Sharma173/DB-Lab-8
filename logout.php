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

session_destroy();
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>

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
</style>


<body>
    <p class = "heading">
    <center><p class = "top"> You have been logged out</p>
    <a href="login.php"><p>Link to Login page.</a>
</center>
</body>
</html>
