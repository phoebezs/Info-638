<?php
session_start();
$_SESSION['firstName'] = "Monica";
$_SESSION['lastName'] = "Maceli";
$_SESSION['occupation'] = "Professor";

echo "Hello ".$_SESSION['firstName'].", you have a session id of ".session_id();
?>

