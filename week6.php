<! DOCTYPE html>
<html>
<head>
    <title>Week 6</title>
</head>
<body>
<h2>Week 6</h2>
<?php
/*
$weatherdata = array (
    "2/27/2019" => array (45, 23, "partly sunny"),
    "2/26/2019" => array (43, 32, "partly sunny"),
    "2/25/2019" => array (55, 41, "sunny")
);

#loop to print out data

foreach ($weatherdata as $date => $date_data) {
    print ("<p>For the date of $date: ");
    print ("<p>High was ".$date_data [0]);
    printf ("<p>Low was %.2f degree F",$date_data [1]); //formats to 2 floating decimal points
}

$red = 100;
$green = 198;
$blue = 87;

printf ("<p>#%X%X%X", $red, $green, $blue);  //%X converts to hexadecimal
printf ("<p>#%X%X%X", $red-10, $green+10, $blue+15); //can add values to each color 
printf ("<p>#%X%X%X", $red-10, $green-10, $blue-15);
printf ("<p>#%X%X%X", $red+14, $green+20, $blue+35);

$basecolor = sprintf ("#%X%X%X", $red-10, $green+10, $blue+15); //can add value to each color 
$lightercolor = sprintf ("#%X%X%X", $red-10, $green-10, $blue-15);
$darkercolor = sprintf ("#%X%X%X", $red+14, $green+20, $blue+35);

print ("<p>");
?>

<div style="background-color:<?php echo $basecolor ?>">1</div>
<div style="background-color:<?php echo $lightercolor ?>">2</div>
<div style="background-color:<?php echo $darkercolor ?>">3</div>

<?php
print ("<p>");
echo date ("M d, Y", time());

$filehand = fopen("test.txt", 'w');
fwrite ($filehand, "Hello World");  //write to the file you just opened
fclose ($filehand);
?>

<h2>Pig Latin</h2>
<?php
*/

$phrase = "The quick brown fox";
print_r (explode(" ",$phrase));

$words = explode(" ", $phrase);  //turns the phrase into an array
$piglatin  = "<p>In pig latin, this is: ";

foreach ($words as $w) {
    print ("<p>Before: $w </p>");
    $newword = strtolower(substr($w,1) . substr($w,0,1) . "ay");
    #print ($newword);
    $piglatin = $piglatin . $newword . " ";
    
}

$final = strtoupper(substr($piglatin,0,1)) . substr($piglatin,1);

print ($final);




?>
</body>
</html>