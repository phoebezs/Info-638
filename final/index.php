<!DOCTYPE html>
<html>

<head>
<title>NYC Public Toilets</title>
<link rel="stylesheet" type="text/css" href="includes/pstein5.css">
</head>

<body>
<?php
include_once ("includes/header.php"); 

#connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
    
#construct query
$query = 'SELECT * FROM `location` ORDER BY RAND() LIMIT 1';

#send to db
$result = $conn->query($query);
if (!$result) die($conn->error);

#output to user
while ($row=$result->fetch_assoc()){
    print "<h2>Random Public Toilet Generator</h2>";
    print "<div class='record'><h3><a href='record.php?loc_id=" . $row["loc_id"] ."' class='name'>" . $row["name"] . "</a></h3>
    <p> Location: " . $row["location"] . "</p>
    <p> Hours: " . $row["hours"] . "</p></div>";
}
?>

<h2>Search for a Toilet:</h2>

<div class="form">
    <form method="GET" action="results.php">
        <div>Name <input type="text" name="name"></div><br>
        Borough<br>
        <input type="checkbox" name="borough[]" value="Bronx">Bronx<br>
        <input type="checkbox" name="borough[]" value="Brooklyn">Brooklyn<br>
        <input type="checkbox" name="borough[]" value="Manhattan">Manhattan<br>
        <input type="checkbox" name="borough[]" value="Queens">Queens<br>
        <input type="checkbox" name="borough[]" value="Staten Island">Staten Island<br><br>
        Gender<br>
        <input type="checkbox" name="gender[]" value="men">Men<br>
        <input type="checkbox" name="gender[]" value="women">Women<br>
        <input type="checkbox" name="gender[]" value="neutral">Neutral<br><br>
	    Handicap Accessible
        <input type="checkbox" name="handicap_access"><br><br>
        Changing Tables
        <input type="checkbox" name="change_table"><br><br>
	    <input type="submit" name="submit" value="Search">
    </form>
</div>    

<?php
include_once ("includes/footer.php");
?>

</body>
</html>