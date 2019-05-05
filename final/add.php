<!DOCTYPE html>
<html>
	<head>
    <title>Add a public toilet</title>
    <link rel="stylesheet" type="text/css" href="includes/pstein5.css">
	</head>
<body>

<?php
include_once ("includes/header.php"); 

# get the login form data
if (isset($_POST['submit'])) {
    if ( empty($_POST['username']) || empty($_POST['password']) ) {
		$message = '<p class="error">Please fill out all of the form fields!</p>';
} else {
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    #sanitize data coming from user
    $username_entered = sanitizeMySQL($conn, $_POST['username']);
    $password_entered = sanitizeMySQL($conn, $_POST['password']);
    
    #need to salt and hash password first
    $salt1 = "nsjdw8ey";
    $salt2 = "3ou49dsh";
    $hashedpwd = hash('ripemd128', $salt1.$password_entered.$salt2);

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
}
}

#Add a toilet to the database
if (isset($_POST['submit'])) { //check if the form has been submitted
    if ((empty($_POST['name'])) || (empty($_POST['location'])) || (empty($_POST['hours'])) || (empty($_POST['boro_id'])) || 
        (empty($_POST['boro_name'])) || (empty($_POST['gender'])) || (empty($_POST['handicap_access'])) || 
        (empty($_POST['change_table'])) || (empty($_POST['stalls'])) ) {
		$message = '<p class="error">Please fill out all of the form fields!</p>';
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        
		$name = sanitizeMySQL($conn, $_POST['name']);
		$location = sanitizeMySQL($conn, $_POST['location']);			
        $hours = sanitizeMySQL($conn, $_POST['hours']);
        $boro_id = sanitizeMySQL($conn, $_POST['boro_id']);
        $boro_name = sanitizeMySQL($conn, $_POST['boro_name']);
        $gender = sanitizeMySQL($conn, $_POST['gender']);
        $h_a = sanitizeMySQL($conn, $_POST['handicap_access']);
        $c_t = sanitizeMySQL($conn, $_POST['change_table']);
        $stalls = sanitizeMySQL($conn, $_POST['stalls']);

        
        $query = 'INSERT INTO `borough` VALUES(NULL, \"$boro_name\")';
        $result = $conn->query($query);
        $insertID = $conn->insert_id;

        $query = 'INSERT INTO `location` VALUES(NULL, \"$name\", \"$location\", \"$hours\", NULL, \"$insertID\" )';
        $result = $conn->query($query);
        $insertID = $conn->insert_id;

        $query = 'INSERT INTO `rooms` VALUES(NULL, \"$insertID\", \"$gender\", \"$h_a\", \"$c_t\", \"$stalls\" )';
        $result = $conn->query($query);
        
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p class=\"message\">Successfully added new toilet! <a href=\"index.php\">Return to home</a></p>";
		}
	}
}

if (isset($message)) echo $message;

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

<h1>Add a public toilet</h1>
<div class="form">
    <form method="POST" action="">
        Borough<br>
        <select name="boro_name" size="1">
        <option value="Bronx">Bronx</option>
        <option value="Brooklyn">Brooklyn</option>
        <option value="Manhattan">Manhattan</option>
        <option value="Queens">Queens</option>
        <option value="Staten Island">Staten Island</option>
        </select><br><br>
        <div>Name <input type="text" name="name"></div><br>
        <div>Location <input type="text" name="location"></div><br>
        <div>Hours <input type="text" name="hours"></div><br>
        Gender<br>
        <input type="checkbox" name="gender[]" value="men">Men<br>
        <input type="checkbox" name="gender[]" value="women">Women<br>
        <input type="checkbox" name="gender[]" value="neutral">Neutral<br><br>
	    Handicap Accessible
        <input type="checkbox" name="handicap_access"><br><br>
        Changing Tables
        <input type="checkbox" name="change_table"><br><br>
        <div>Number of Stalls <input type="text" name="stalls"></div><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>    

<?php 
include_once ("includes/footer.php"); 
?>

</body>
</html>