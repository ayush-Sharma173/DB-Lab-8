<?php
$servername = "localhost";
$username = "root";
$password = "password123"; 
$dbname = "dblab8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 

if ($conn->connect_error) {
    echo "xyx";
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "connection estd";
}
?>
