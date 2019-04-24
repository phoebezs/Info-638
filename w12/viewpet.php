<?php
include_once 'header.php';
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['pet_id'])) {
	$id = sanitizeMySQL($conn, $_GET['pet_id']);
	$query = "SELECT * FROM pets WHERE pet_id=".$id;
	$result = $conn->query($query);
	if (!$result) die ("Invalid pet id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No pet found with id of $id<br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h1>Pet Information</h1>';
			echo $row["name"]." is a ".$row["age"]." year(s) old ".$row["sex"]." ".$row["species"];		
		}
	}
	echo "<p><a href=\"pets.php\">Return to homepage</a></p>";
} else {
	echo "No pet id passed";
}

include_once 'footer.php';

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
