
<?php
#header can include session info, sanitizing functions, database login info
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Homepage</title>
	</head>
<body>
<h1>Welcome to my site</h1>

<?php
#if set then logged in user
if (isset($_SESSION['username'])) {
    print "Hello ".$_SESSION['username'];
    #admin page links
    print " <a href='logout.php'>Logout</a>";
} else {
    print " <a href='login_page.php'>Login</a>";
}

?>
</html>