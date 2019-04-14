<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$stmt = $conn->prepare('INSERT INTO pets VALUES(?,?,?,?,NULL)');
$stmt->bind_param('siss', $name, $age, $sex, $species);

$name = 'Emily';
$age = 6;
$sex = 'F';
$species = 'cat';
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);

$stmt->close();
$conn->close();
?>
