<?php
include_once 'header.php';
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM pets";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;

echo "<table><tr> <th>Id</th> <th>Name</th><th>Age</th><th>Sex</th><th>Species</th></tr>";
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>".$row["pet_id"]."</td><td>";
	echo "<a href=\"viewpet.php?pet_id=".$row["pet_id"]."\">".$row["name"]."</a>";
	echo "</td><td>".$row["age"]."</td><td>".$row["sex"]."</td><td>".$row["species"]."</td>";		
	echo '</tr>';
}
echo "</table>";
echo "<a href=\"addnewpet.php\">Add a New Pet</a>";

include_once 'footer.php';
?>