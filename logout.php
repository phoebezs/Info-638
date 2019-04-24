<?php
session_start();
$_SESSION = array();
session_destroy();

include_once ("header.php");
?>


You logged out!


<?php
//include_once ("footer.php");
?>