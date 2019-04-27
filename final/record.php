<!DOCTYPE html>
<html>
<head>
<title>Locations</title>
<link rel="stylesheet" type="text/css" href="pstein5.css">
</head>

<body>
<?php
include_once ("header.php"); 
/*if we have cookie info, show a greeting
if (isset($_COOKIE["name"])){
    print "Welcome to the site, ".$_COOKIE["name"];
}
*/

#http://localhost/info-638/eachbook.php?isbn=9780099533474
#print_r($_GET);

#check for loc_id existing in GET
if (isset($_GET["loc_id"]) && !empty($_GET["loc_id"]) ){
    #connect to db
    $conn = new mysqli("localhost", "root", "", "pstein5");
	if ($conn->connect_error) die($conn->connect_error);
    
    #sanitize data
    $loc_id = sanitizeMySQL($conn, $_GET["loc_id"]);
    
    #construct query
    $query = 'SELECT * FROM `location` WHERE loc_id="'.$loc_id.'"';
    #print $query;

    #send to db
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    #output to user
    #test with 9780141439969  and  9780582506206
    while ($row=$result->fetch_assoc()){
        #print_r ($row);
        print "<h1>" . $row["name"] . "</h1>";
        print "<p>" . $row["location"] . "</p>";
        print "<p>" . $row["hours"] . "</p>";
    }

} else {
    #no loc_id or empty loc_id
    print "No location found!";
}



#SANITIZE
function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}

print '<a href="index.php">Back to home</a>';

include_once ("footer.php");
?>
</body>
</html>