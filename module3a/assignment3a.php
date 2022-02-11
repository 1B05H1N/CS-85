<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cost Per Square Foot Area Function</title>
</head>
<body>
<h2>Total Property Cost Calculator</h2>

<?php

$length = 20;

$width = 4;

$ftCost = 75;

//define rArea() function
//ADD rArea() FUNCTION HERE
function rArea($length, $width){
    return $length * $width;
}

//call function rArea()
echo "A room of length " . $length . "ft and width " . $width . "ft has an area of " . rArea($length ,$width ) ." ft. ";

//define totalCost() function

//ADD totalCost() FUNCTION HERE
function totalCost($length, $width, $cost){
    return $length * $width * $cost;
}

//call function totalCost()
echo "The total cost of a room of length ". $length . "ft and width " . $width . "ft area at $". $ftCost . " per square foot is " . totalCost($length ,$width,$ftCost) .".";

?>
</body>
</html>