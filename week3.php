<!DOCTYPE html>
<html>
<head>
    <title>Hello again!</title>
<style>
table, td {
    border: 2px solid black;
    border-collapse: collapse;
}
.squares {
    background-color: yellow;
}
</style>
</head>
<body>
<?php
$avalue = 10;
echo ++$avalue;
echo ($avalue+10);

$weathercondition = "Sunny";
$temp = 45;
if ($weathercondition == "Sunny") {
    $pack_umbrella = False;

}
elseif ($temp <50) {
    $pack_fleece = True;
}

else {
    $pack_umbrella = True;
}

switch ($temp) {
    case 45:
        echo "It's cold!";
        break;
    case 55:
        echo "It's warm!";
        break;
    default:
        echo "It is $temp";
        break;
}
?>

<?php
#SPEED TRAP
$my_speed = 82;
$curr_date = date ("md");

# check if it's bday
if ($curr_date == "0205") {
    $is_bday = True;
    $my_speed -=5;
} 

if ($my_speed > 80) {
    #big ticket
    echo "<p>Big ticket!</p>";
}
elseif ($my_speed < 61) {
    #no ticket
    echo "<p>No ticket!</p>";
}
else {
    #med ticket
    echo "<p>Medium ticket!</p>";                 
}
?>

<?php
#LOOPS
$my_speed = 82;

while ($my_speed > 80) {
   echo "<p>Slow down!</p>";
    --$my_speed;
    echo "my speed is $my_speed";
}
do {
    echo "<p>Slow down!</p>";
    --$my_speed;
    echo "my speed is $my_speed";

} while ($my_speed > 80);

#for ($i = 1; $i < 30; ++$i) {
#    echo $i;
#    break;
#}
?>

<?php
#TIMES TABLE

echo "<table>";
#repeat 12 times for each row

for ($row = 1; $row <=12; ++$row){
    echo "<tr>";
}
    #repeat 12 times for each column
    for ($col = 1; $col <= 12; ++$col) {
        if ($row==$col) {
            echo "<td class=\"squares\">";
        } else {
            echo "<td>";
        }
    echo "<td>" . ($row*$col) . "</td>";
    #repeat 12 times for each cell/column  
    }

?>

</body>
</html>