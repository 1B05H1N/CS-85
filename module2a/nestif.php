<!DOCTYPE html>
<html>
<head>
    <title>Assignment Title</title>
    <meta charset="utf-8">
</head>
<body>

<?php

    $guessNum = 2;

    if($guessNum >= 10 && $guessNum <= 25) {
        echo "<p>Number is between 10 and 25</p>";
    }

    else if($guessNum >= 5 && $guessNum <= 10) {
        echo "<p>Number is between 5 and 10</p>";
    }

    else if ($guessNum >= 1 && $guessNum <= 5) {
        echo "<p>Number is between 1 and 5</p>";
    }

    /*
     * Alternative method:
     *
     * else if($guessNum <= 10 && $guessNum >= 5)
     *      echo "<p>Number is between 5 and 10</p>";
     * else
     *      echo "<p>Number is between 1 and 5</p>";
     */
?>

</body>
</html>