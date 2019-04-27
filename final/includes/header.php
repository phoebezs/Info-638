<?php
#header can include session info, sanitizing functions, database login info
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="includes/pstein5.css">
	</head>
<body>
<h1 style='text-align:center'>NYC Public Toilets</h1>

<?php
#if set then logged in user
if (isset($_SESSION['username'])) {
    #print "Hello, ".$_SESSION['username']."!";
    #admin page links
    print "<p style='text-align:right'><a href='logout.php'>Logout</a></p>";
} else {
    print "<p style='text-align:right'><a href='includes/login.php'>Login</a></p>";
}

?>
</html>