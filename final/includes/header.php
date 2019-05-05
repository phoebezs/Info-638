<?php
#header can include session info, sanitizing functions, database login info
session_start();
require_once 'includes/dblogin.php';
?>
<!DOCTYPE html>
<html>
	<head>
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="includes/pstein5.css">
    </head>
    
<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <?php
    if (isset($_SESSION['username'])) {
        print "<a href='add.php'>Add a Toilet</a>";
        print "<a href='logout.php'>Logout</a>";
    } else {
        print "<a href='login.php'>Login</a>";
    }
    ?>
</div> 

<div class=header><h1 style='text-align:center'>NYC Public Toilets</h1></div>

<p>
<?php
if (isset($_SESSION['username'])) {
    print "Hello, ".$_SESSION['username']."!";
}
?>
</p>

</body>
</html>