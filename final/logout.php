<! DOCTYPE html>
<html>
<head>
<title>Logout</title>
<link rel="stylesheet" type="text/css" href="includes/pstein5.css">
</head>
<body>
<?php
session_start();
$_SESSION = array();
session_destroy();

include_once ("includes/header.php");
?>

<p>You have logged out!</p>

<?php
include_once ("includes/footer.php");
?>
</body>
</html>