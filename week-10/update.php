<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "UPDATE volunteers SET firstName='Sammie' WHERE firstName='Sam'";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
?>
