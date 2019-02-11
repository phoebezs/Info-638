<!DOCTYPE html>
<head>
<title>
    Code Homework 1
</title>

<style>

</style>
</head>

<body>
<h1>Challenge: Correct Change</h1>
<?php
$mychange=159;
$coins = array (100, 25, 10, 5, 1);
$dollar=100;
$quarter=25;
$dime=10;
$nickel=5;
$penny=1;

echo "<p>You are due $mychange cents back in total.</p>";
print (int) $mychange%100;

?>

<h1>Challenge: 5 Bottles of Beer</h1>

<?php
$beer=5;

/*for ($beer=5; $beer>=0; --$beer) 
{
    echo "$beer bottles of beer on the wall, $beer bottles of beer! Take one down, pass it around, " . --$beer . " bottles of beer on the wall!"; 
    echo "<br>";

}*/

do 
{
    echo "<p>$beer bottles of beer on the wall, $beer bottles of beer! Take one down, pass it around, " . --$beer . " bottles of beer on the wall!</p>"; 
    echo "<br>";
} while ($beer >=1);

?>
</body>
</html>