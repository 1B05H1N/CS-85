<!DOCTYPE html>
<html lang="en">
<head>
    <title>Even Numbers</title>
    <meta charset="UTF-8">
</head>
<body>

<?php

// zero is an even number according to parity of zero https://en.wikipedia.org/wiki/Parity_of_zero
$i = 0;

while ($i < 101) {
    if ($i %2 ==0) {
        echo ($i . "<br>");
    }
    $i++;
}
?>

</body>
</html>