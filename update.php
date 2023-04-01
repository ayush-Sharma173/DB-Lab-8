<?php
//Connect to MySQL 
require 'config.php';
session_start();

function endsWith($string, $smol)
{
  $len = strlen($smol); 
  if ($len == 0) {
    return true;
  }
  return substr($string, -$len) === $smol;
}

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: login.php");
}
$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from userdata where email = '$email'");
$row = mysqli_fetch_array($result);

$Fname = $row["fName"];
$Lname = $row["lName"];
$pass = $row["password"];

if (isset($_POST['Submit'])){
    $new_fname = $_POST["fName"];
    $new_lname = $_POST["lName"];
    $new_pass1 = $_POST["pass1"];
    $new_pass2 = $_POST["pass2"];

    $number = preg_match('@[0-9]@', $new_pass1);         //password strength
    $uppercase = preg_match('@[A-Z]@', $new_pass1);
    $lowercase = preg_match('@[a-z]@', $new_pass1);
    $specialChars = preg_match('@[^\w]@', $new_pass1);

    if($new_pass1 != $new_pass2){
        echo '<script type="text/javascript">alert("Passwords Dont Match!")</script>';
    }
    else{
        // if(!endsWith($email, '@iitp.ac.in')){
        //     echo '<script type="text/javascript">alert("Enter IIT Patna email only!")</script>';
        // }
        // else{
            // if(strlen($new_pass1) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            //     echo '<script type="text/javascript">alert("Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.")</script>';
            // }
            // else{
                $query = "update userdata set fName = '$new_fname', lName = '$new_lname', password = '$new_pass1' where email = '$email'";
                $result = mysqli_query($conn, $query);

                if($result){
                    echo '<script type="text/javascript">alert("Updated Successfully! Logging you out.")</script>';
                    echo '<script language="javascript">window.location = "http://localhost/DBMS/logout.php";</script>';
                }
                else{
                    echo '<script type="text/javascript">alert("Error!")</script>';
                }
            //}
        //}
    }

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
		}

		h1 {
			font-size: 36px;
			margin-top: 80px;
			margin-bottom: 40px;
			text-align: center;
		}

		form {
			max-width: 600px;
			margin: 0 auto;
			padding: 0 20px;
		}

		label {
			display: block;
			font-size: 20px;
			margin-bottom: 8px;
		}

		input[type="text"],
		input[type="password"] {
			display: block;
			padding: 10px;
			font-size: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 20px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 20px;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
			margin-bottom: 20px;
		}

		input[type="submit"]:hover {
			background-color: #0062cc;
		}

		a {
			display: block;
			font-size: 20px;
			text-align: center;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<h1>Update Profile</h1>

	<?php if (isset($error)): ?>
		<p><?php echo $error; ?></p>
	<?php endif; ?>

	<form action="" method="post">
		<label for="FirstName">First Name:</label>
		<input type="text" id="FirstName" name="fName" value="<?php echo $Fname ?>" required>

		<label for="LastName">Last Name:</label>
		<input type="text" id="LastName" name="lName" value="<?php echo $Lname ?>" required>

		<label for="Password1">Password:</label>
		<input type="password" id="Password1" name="pass1" value="<?php echo $pass ?>" required>

		<label for="Password2">Confirm Password:</label>
		<input type="password" id="Password2" name="pass2" value="<?php echo $pass ?>" required>

		<input type="submit" value="Update Details" name="Submit">
		<a href="after_login_menu.php">Back to Main Menu</a>
	</form>
</body>
</html>

