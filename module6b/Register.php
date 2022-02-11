<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🎳🎳🎳>>>REGISTERED TO BOWL<<<🎳🎳</title>
</head>
<body>

<?php

if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['age']) || empty($_POST['bowling_average']))
    echo "<p><b>Hey now, future bowler!</b><br><br> If you want to bowl on our lanes, you have to enter the whole form! <br> Otherwise we won't have enough info to <s>sell your info</s> register you!</p>\n";
else {
    $FirstName = addslashes($_POST['first_name']);
    $LastName = addslashes($_POST['last_name']);
    $Age = addslashes($_POST['age']);
    $Average = addslashes($_POST['bowling_average']);
    $Bowlers = fopen("bowlers.txt", "ab");
    if (is_writable("bowlers.txt")) {
        if (fwrite($Bowlers, $LastName . ", " . $FirstName . ", " . $Age . ", " . $Average . "\n"))
            echo "<p><b>CONGRATS!!!</b><br><br>🎳🎳🎳>>>YOU'RE REGISTERED TO BOWL<<<🎳🎳</p>\n";
        else {
            echo "<p>Sorry, you weren't registered 😢 </p>\n";
        }
    }
    else
        echo "<p>Cannot write to the file.</p>\n";
    fclose($Bowlers);
}
?>

</body>
</html>