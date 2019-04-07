<!DOCTYPE html>
<html>
<body>
<?php
/*
# Create variables to store our db login information
$hn = 'localhost';
$db = 'animal_shelter';
$un = 'root';
$pw = '';
 
# Make the connection to mysql using the credentials above
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

# Construct the query for the results we'd like
$query = "SELECT * FROM pets";

# Run our query, making sure we received results back
$result = $conn->query($query);
if (!$result) die($conn->error);

# Determine the number of rows returned so we can loop through them
$rows = $result->num_rows;

# Get and print out each row returned from the database
while ($row = $result->fetch_assoc()) {
	echo $row["pet_id"]." ".$row["name"]." ".$row["age"]." ";
	echo $row["sex"]." ".$row["species"]."<br>";
}

# close the database connection
$result->close();
$conn->close();
*/

echo "<h4>Week 10 Exercise</h4>";

$hn = 'localhost';
$db = 'Museum';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * from creator";
$result = $conn->query($query);
if (!$result) die($conn->error);

while ($row = $result->fetch_assoc())
{
	echo $row["creator_id"]." ".$row["first_name"]." ".$row["last_name"]."<br>";
}
?>
</body>
</html>
