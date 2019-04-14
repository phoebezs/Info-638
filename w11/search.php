<!DOCTYPE html>
<html>
<head>
<title>Search Pets Table</title>
<style>
table {
	border-collapse: collapse;
	margin: 10px;
}
table, tr, th, td {
	border: 1px solid #000;
}
</style>
</head>
<body>
<?php
require_once 'login.php';
if (isset($_GET['submit'])) { //check if the form has been submitted
	if (empty($_GET['name'])) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$name = sanitizeMySQL($conn, $_GET['name']);
		$query = "SELECT * FROM pets WHERE name LIKE '%$name%'";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$rows = $result->num_rows;
			if ($rows) {
				echo "<h1>Results</h1><table><tr><th>Id</th><th>Name</th><th>Age</th><th>Sex</th><th>Species</th></tr>";
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row["pet_id"]."</td><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["sex"]."</td><td>".$row["species"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "<p>No results!</p>";
			}
			echo "<h2>Search Again</h2>";
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
<form method="get" action="search.php">
	<fieldset>
		<legend>Search for a pet</legend>
		<label for="name">Name:</label>
		<input type="text" name="name" required><br> 
		<input type="submit" name="submit">
	</fieldset>
</form>
</body>
</html>