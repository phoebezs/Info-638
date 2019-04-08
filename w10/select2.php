<?php 
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM pets";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;

# retrieve rows in an associative array with the field as the key 
while ($row = $result->fetch_assoc()) {
	echo $row["pet_id"]."<br>".$row["name"]."<br>".$row["age"]."<br>".$row["sex"]."<br>".$row["species"]."<br>";
}

$result->close();
$conn->close();
?>
