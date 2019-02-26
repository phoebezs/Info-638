<!DOCTYPE html>
<html>
<head>
    <title>Week 5</title>
</head>

<body>
<h1>Week 5</h1>

<?php
###### homework review ########
$headimgpath = "heads.jpg";
$tailimgpath = "tails.jpg";
#<img src="heads.jpg"> hosted in local htdocs folder

if (mt_rand(0,1)==1) {
    $imgpath = $headimgpath;
} else {
    $imgpath = $tailimgpath;
}

print "<img src=\"".$imgpath."\">";

######### ARRAYS #########

echo "<h2>Arrays</h2>";

########## numeric arrays #############

$chairs = array("stool","office","armchair","rocking chair");
print_r ($chairs);

foreach ($chairs as $key=>$chair) {
    print "<p>Key is $key, value is $chair</p>";
}

print count($chairs);
echo "<br>";

for ($i = 0; $i < count($chairs); ++$i){
    print "At position $i is value " . $chairs[$i];
}

echo "<br>";

print $chairs[2];
$chairs [4] = "highchair";

echo "<br>";

array_push ($chairs, "bench", "campchair");  //adds to end of array
unset ($chairs[6]); //removes specific position from array

print_r ($chairs);
echo "<br>";

########### associative arrays ##############
echo "<h3>Associative Arrays</h3>";

$chair_costs = array("highchair"=>100.00, "stool"=>12.50);
print $chair_costs ["highchair"];
print_r ($chair_costs);
echo "<br>";

$course = array (
    "12345"=>78.9, 
    "67890"=>92.4, 
    "54321"=>88.9, 
    "09876"=>85.5, 
    "24680"=>96.4
);

foreach ($course as $student=>$grade) {
    print "<p>Student ID $student, received a grade of $grade</p>";
}

print "The overall class average was " . array_sum($course) / count($course) . "<br>";  //use two array functions to find sum and then diivde by count of items in the array

print_r ($course);

sort ($course);

print ("Lowest grade is " . $course[0] . ".<br>" . "Highest grade is " . $course[4] . ".<br>");


###### multidimensional arrays ######
echo "<h3>Multidimensional Arrays</h3>";

$studentinfo = array (
    "1234" => array (3.9,"USA","MSLIS"),
    "5678" => array (3.8,"CAN","IXD",)
    );

print_r ($studentinfo) . "<br>";

#print $studentinfo["5678"]; //not a value, but whole array, so sends error
print $studentinfo["5678"][2] . "<br>";

print "foreach loops access data inside an array" . "<br>";
foreach ($studentinfo as $studentid => $student_array) {     // foreach loops access data inside an array
    print "<div>Student ID: $studentid</div>";
    print "GPA: " . $student_array[0] . "Country: " . $student_array[1];
    foreach ($student_array as $infopiece) {
        print $infopiece. "<br>";
    }
}

print "<br>";
$string_ex = "Hello world";
print ($string_ex[1]);































?>


</body>
</html>