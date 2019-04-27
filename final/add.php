<?php
include_once ("includes/header.php"); 
# Start session
session_start();
# get the form data
if (isset($_POST['username']) and isset($_POST['passwd'])) {
    # check it against the db
    $conn = new mysqli("localhost", "root", "", "pstein5");
    if ($conn->connect_error) die($conn->connect_error);

    #sanitize data coming from user
    $username_entered = sanitizeMySQL($conn, $_POST['username']);
    $password_entered = sanitizeMySQL($conn, $_POST['passwd']);

    # if known user continue to form 
    
    #need to salt and hash password first
    $salt1 = "nsjdw8ey";
    $salt2 = "3ou49dsh";
    $pwdwithsalts = $salt1.$password_entered.$salt2;
    $hashedpwd = hash('ripemd128', $pwdwithsalts);

    $query = 'SELECT * FROM users WHERE username="'. $username_entered .'" AND password="'.$hashedpwd.'"';
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);

	if($result->num_rows) {
		print "Welcome $username_entered!";
		$_SESSION['username'] = $username_entered;
	} else {
		print "User not recognized";
		die("<p><a href='includes/login.php'>Go to Login</a>");
	}

} else {
# else, redirect or show error and kill page. 

}
?>
<!DOCTYPE html>
<html>
	<head>
    <title>Add a public toilet</title>
    <link rel="stylesheet" type="text/css" href="includes/pstein5.css">
	</head>
<body>

<h1>Add a public toilet</h1>

<!--ANIMAL SHELTER ADD PET BELOW, EDIT!!-->

<?php

if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['name'])) || (empty($_POST['age'])) || (empty($_POST['sex'])) || (empty($_POST['species'])) || (empty($_POST['caretaker_id'])) ) {
		$message = '<p class="error">Please fill out all of the form fields!</p>';
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$name = sanitizeMySQL($conn, $_POST['name']);
		$age = sanitizeMySQL($conn, $_POST['age']);			
		$sex = sanitizeMySQL($conn, $_POST['sex']);
		$species = sanitizeMySQL($conn, $_POST['species']);
		$caretaker_id = sanitizeMySQL($conn, $_POST['caretaker_id']);
		$query = "INSERT INTO pets VALUES(NULL, \"$name\", $age, \"$sex\", \"$species\", \"$caretaker_id\")";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p class=\"message\">Successfully added new toilet! <a href=\"index.php\">Return to home</a></p>";
		}
	}
}

function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}
?>

<?php 
if (isset($message)) echo $message;
?>

<form method="POST" action="results.php">
	Borough 
	<select name="borough">
		<option value="Bronx">Bronx</option>
		<option value="Brooklyn">Brooklyn</option>
        <option value="Manhattan">Manhattan</option>
        <option value="Queens">Queens</option>
        <option value="Staten Island">Staten Island</option>
    </select>
    <div>Name <input type="text" name="name"></div>
    <div>Location <input type="text" name="location"></div>
    Gender<br>
    <input type="checkbox" name="male" value="male">Male<br>
    <input type="checkbox" name="female" value="female">Female<br>
    <input type="checkbox" name="neutral" value="neutral">Neutral<br>
	Handicap Access
    <input type="checkbox" name="handicap_access" value="handicap accessible"><br>
    Changing Tables
    <input type="checkbox" name="change_table" value="changing tables"><br>
	<input type="submit" value="Search">
</form>

<?php 
include_once ("includes/footer.php"); 
?>