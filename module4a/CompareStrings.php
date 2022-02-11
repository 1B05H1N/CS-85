<!DOCTYPE html>
<html>
<head>
    <title>Compare Strings</title>
</head>
<body>

<h1>Compare Strings</h1><hr />

<?php

$firstString = "Geek2Geek";
$secondString = "Geezer2Geek";

function sameVar($var1, $var2) {
    echo "The sameVar function will print a statement stating string " . $var1 . " does match " . $var2 . ".";
}

function diffVar($var1, $var2) {
    echo "The diffVar function will print a statement stating string " . $var1 . " does not match " . $var2 . ".";
}

if ((strlen($firstString) !== 0 ) & (strlen($secondString) !== 0 ))
{
    if ($firstString == $secondString) {
        sameVar($firstString, $secondString);
    } else {
        diffVar($firstString, $secondString);
    }
}

else {
    echo "<p>Either the \$firstString variable or the \$secondString variable does not contain a value so the two strings cannot be compared. </p>";
}

?>
</body>
</html>