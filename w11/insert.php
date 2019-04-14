<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "INSERT INTO pets VALUES ('Samantha', 5, 'F', 'cat', NULL)";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
echo "The Insert ID was: " . $conn->insert_id;
?>
