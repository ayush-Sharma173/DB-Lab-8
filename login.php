<?php

$servername = "localhost";
$username = "root";
$password = "password123";
$dbname = "dblab8";
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

if(isset($_POST["Submit"]))
{
    $email = $_POST["email"]; 
    $pass = $_POST["pass"];

    $query = "select * from userdata where email = '$email' and password = '$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0)
    {
        session_start();
        $_SESSION['sess_user'] = $email;
        header ('Location: after_login_menu.php');
    }
    else
    {
        echo '<script type="text/javascript">alert("Invalid Email or Password!")</script>';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
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
        body {
            background-color: green;
        }

        h1 {
            font-size: 3.5rem;
            text-align: center;
            margin-top: 4rem;
            color: black;
        }

        form {
            background-color: #ffffff;
            max-width: 30rem;
            margin: auto;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        label {
            font-size: 1.5rem;
            color: #4a4a4a;
            margin-bottom: 1rem;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            font-size: 1.5rem;
            padding: 0.5rem;
            width: 100%;
            border: 0;
            border-radius: 0.25rem;
            box-shadow: inset 0 0.1rem 0.25rem rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            color: #4a4a4a;
        }

        input[type="submit"] {
            font-size: 1.5rem;
            background-color: #008080;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border: 0;
            border-radius: 0.25rem;
            transition: background-color 0.2s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #005656;
            cursor: pointer;
        }

        .top {
            font-size: 1.5rem;
            color: #4a4a4a;
            text-align: center;
            margin-top: 2rem;
        }

        .top a {
            color: #008080;
            text-decoration: none;
        }

        .top a:hover {
            text-decoration: underline;
        }
        /* General styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
}

a {
    color: #008080;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Form styles */
form {
    background-color: #ffffff;
    max-width: 30rem;
    margin: auto;
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

label {
    display: block;
    font-size: 1.5rem;
    color: #4a4a4a;
    margin-bottom: 1rem;
}

input[type="text"],
input[type="password"] {
    font-size: 1.5rem;
    padding: 0.5rem;
    width: 100%;
    border: 0;
    border-radius: 0.25rem;
    box-shadow: inset 0 0.1rem 0.25rem rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
    color: #4a4a4a;
}

input[type="submit"] {
    font-size: 1.5rem;
    background-color: #008080;
    color: #ffffff;
    padding: 0.5rem 1rem;
    border: 0;
    border-radius: 0.25rem;
    transition: background-color 0.2s ease-in-out;
}

input[type="submit"]:hover {
    background-color: #005656;
    cursor: pointer;
}

.top {
    font-size: 1.5rem;
    color: #4a4a4a;
    text-align: center;
    margin-top: 2rem;
}

    </style>
</head>

<body>
    <h1>User Login</h1>
    <form action="" method="post">
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>

        <input type="submit" value="Login" name="Submit">
        <div class="top">Don't have an account? <a href="register.php">Register</a></div>
    </form>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>

<style>
p.heading 
{
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
        <center><h1>User Login</h1></p>
        <p class = "top">
            <?php if (isset($error)): ?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required><br><br>

                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" required><br><br>

                <input type="submit" value="Login" name = "Submit">
                <p class = "top">No credentials yet? <a href="register.php">Register</a>
            </form>
        </center>
    </p>
</body>
</html> -->
