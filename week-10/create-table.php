<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "CREATE TABLE volunteers (
id SMALLINT NOT NULL AUTO_INCREMENT,
firstName VARCHAR(32) NOT NULL,
lastName VARCHAR(32) NOT NULL,
birthday DATE NOT NULL,
PRIMARY KEY (id)
)"; 
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
?>
