<!DOCTYPE html>

<body>
<?php
print_r($_GET);
print_r($_POST);
?>

<form action="week11.php" method="POST">
<div>Title Search</div>
<div><input type="text" name="theirname"></div>
<input type="submit" value="Go!">
</form>

<?php
#echo "<h1>Results</h1>";
#SELECT * FROM `classics` WHERE title LIKE "%the%"
if (isset($_POST["theirname"]) && !empty($_POST["theirname"])){
echo "Your search for: ";
echo $_POST["theirname"];
echo "<h1>Results</h1>";

#connect to db
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

#construct query
$searchterm=$_POST["theirname"];
$query = "SELECT * FROM `classics` WHERE title LIKE '%".$searchterm." %'";
echo $query;

#send query
$result = $conn->query($query);
if (!$result) die($conn->error);

#show results to user or message if no results
$rows = $result->num_rows;
echo $rows;

} else {
    #we have rows of results
    echo "<ol>";
    while ($row = $result->fetch_assoc()) {
        print_r ($row);
        echo "<li>".$row["title"]."</li>";
    }
    echo "</ol>";
}
?>

</body>
</html>