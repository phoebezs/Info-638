<?php 
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
  
$salt1 = "qm&h*";  
$salt2 = "pg!@";  
$fname = 'Bill';  
$lname = 'Smith';  
$username = 'bsmith';  
$password = 'mysecret';  
$token = hash('ripemd128', "$salt1$password$salt2");

$query  = "INSERT INTO users VALUES(NULL, '$fname', '$lname', '$username', '$token')";    
$result = $conn->query($query);    
if (!$result) die($conn->error);  
?>
