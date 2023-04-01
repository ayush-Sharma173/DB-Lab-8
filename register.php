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
    die("Connection failed: " . $conn->connect_error);
}
else
{
    // echo "connection estd";
}



// Check if the form was submitted
if (isset($_POST["Submit"])) 
{
    $first_name= $_POST["fName"];
    $last_name = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["pass1"];
    $confirm_password = $_POST["pass2"];

    // Validate the form data
    if ($password != $confirm_password) 
    {
        echo "Error: Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        echo "Error: Invalid email address.";
    } elseif (strlen($password) < 1) 
    {
        echo "Error: Password must be at least 1 characters long.";
    } else 
    {
        // Hash the password
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO userdata VALUES('$first_name', '$last_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) 
        {
            echo "Registration successful!";
        } else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>

  <style>
    
body{
  margin: 0;
  padding: 0;
  background-color: #cf000f;
  background-size: 80px 80px;
  background-image:
  -webkit-linear-gradient(0deg,rgba(0,0,0,0.3) 50%,transparent 50%),
  -webkit-linear-gradient(rgba(0,0,0,0.5) 50%,transparent 50%);
}



    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #e86043;
      border-radius: 10px;
      box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
      padding: 30px;
    }

    h1 {
      text-align: center;
      font-size: 36px;
      margin-bottom: 20px;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 3px;
      font-weight: 900;
    }

    label {
      font-size: 16px;
      font-weight: 500;
      color: #666;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-top: 20px;
      display: block;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-top: 10px;
      box-sizing: border-box;
      background-color: #f9f9f9;
      color: #666;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      box-sizing: border-box;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-weight: 500;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    p.top {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 0;
      font-size: 16px;
      color: #666;
    }

    a {
      color: #333;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>User Registration</h1>

    <?php if (isset($error)): ?>
      <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="post">
      <label for="FirstName">First Name</label>
      <input type="text" id="FirstName" name="fName" required>

      <label for="LastName">Last Name</label>
      <input type="text" id="LastName" name="lName" required>

      <label for="Email">Email Address</label>
      <input type="text" id="Email" name="email" required>

      <label for="Password1">Password</label>
      <input type="password" id="Password1" name="pass1" required>

      <label for="Password2">Confirm Password</label>
      <input type="password" id="Password2" name="pass2" required>

      <input type="submit" value="Register" name="Submit">
      <p class="top">Already a user? <a href="login.php">Login</a></p>
  </form>
</body>
</html>





<!-- <!DOCTYPE html> ogggg
<html>
<head>
  <title>User Registration</title>

  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      font-size: 3rem;
      margin-top: 5rem;
      margin-bottom: 2rem;
    }

    form {
      max-width: 50rem;
      margin: 0 auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      font-size: 1.6rem;
      margin-top: 1rem;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 1rem;
      font-size: 1.6rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      margin-top: 0.5rem;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 1rem;
      font-size: 1.6rem;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      margin-top: 1rem;
      box-sizing: border-box;
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }

    p.top {
      text-align: center;
      margin-top: 2rem;
      margin-bottom: 1rem;
      font-size: 1.6rem;
    }

    a {
      color: #4CAF50;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <h1>User Registration</h1>

  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>

  <form action="" method="post">
    <label for="FirstName">First Name:</label>
    <input type="text" id="FirstName" name="fName" required>

    <label for="LastName">Last Name:</label>
    <input type="text" id="LastName" name="lName" required>

    <label for="Email">Email Address:</label>
    <input type="text" id="Email" name="email" required>

    <label for="Password1">Password:</label>
    <input type="password" id="Password1" name="pass1" required>

    <label for="Password2">Re-Enter Password:</label>
    <input type="password" id="Password2" name="pass2" required>

    <input type="submit" value="Register" name="Submit">
    <p class="top">Already a user? <a href="login.php">Login</a></p>
  </form>
</body>
</html> -->





