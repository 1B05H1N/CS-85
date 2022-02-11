<!DOCTYPE html>
<html>
<head>
    <title>Validate Credit Card</title>
</head>

<body>

<h1>Validate Credit Card</h1><hr />

<?php

$CreditCard = array( "", "8910-1234-5678-6543", "OOOO-9123-4567-0123");

foreach ($CreditCard as $CardNumber) {
    if (empty($CardNumber)) {
        echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";
    } else {

        $Compare = $CardNumber;
        $Compare = str_replace("-", "", $Compare);
        $Compare = str_replace(" ", "", $Compare);
        if (!is_numeric($Compare))
            echo "<p>Credit Card Number " . $Compare . " is invalid because it contains non-numeric characters.</p>";
        else

            echo "<p>Credit Card Number " . $Compare . " is valid.</p>";
    }
}

?>
</body>
</html>