<!DOCTYPE html>
<html>
<head>
<title>Add a Pet</title>
<style>
fieldset {width: 200px;}
label {width: 100%;float: left;}
</style>
</head>
<body>
<?php
require_once 'login.php';
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['name'])) || (empty($_POST['age'])) || (empty($_POST['sex'])) || (empty($_POST['species'])) ) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$name = sanitizeMySQL($conn, $_POST['name']);
		$age = sanitizeMySQL($conn, $_POST['age']);			
		$sex = sanitizeMySQL($conn, $_POST['sex']);
		$species = sanitizeMySQL($conn, $_POST['species']);
		$query = "INSERT INTO pets VALUES(\"$name\", $age, \"$sex\", \"$species\", NULL)";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			echo "<p>Successfully added new animal named $name! <a href=\"pets.php\">Return to pets list</a></p>";
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
<form method="post" action="addnewpet.php">
	<fieldset>
		<legend>Add a Pet</legend>
		<label for="name">Name:</label>
		<input type="text" name="name" required><br> 
		<label for="age">Age:</label> 
		<input type="text" name="age" required><br>
		<label for="sex">Sex:</label> 
		<input type="text" name="sex" required><br>
		<label for="species">Species:</label> 
		<input type="text" name="species" required><br>
		<input type="submit" name="submit">
	</fieldset>
</form>
</body>
</html>