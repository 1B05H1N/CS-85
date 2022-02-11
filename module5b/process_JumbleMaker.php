<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jumble Maker</title>
</head>
<body>

<?php

//displays an error message
function displayError($fieldName, $errorMsg) {
    global $errorCount;
    echo $fieldName." - ".$errorMsg."<br />\n";
    ++$errorCount;
}

//$data is validated and $fieldNames == the form field
//returns $data param after some formatting
function validateWord($data, $fieldName) {
    global $errorCount;
    if (strlen($data) < 4 ||
        strlen($data) > 7) {
        displayError($fieldName, 'Words must be between 4 and 7 letters long.'."<br />\n");
        ++$errorCount;
    } elseif (ctype_alpha($data)) { //ctype_alpha function returns TRUE if every character in text is a letter, FALSE otherwise.
        displayError($fieldName, 'Word must only be letters'."<br />\n");
        ++$errorCount;
    } else {
        $data = strtoupper($data);
        $data = str_shuffle($data);
    }
    return $data;
}

$errorCount = 0;

$words = array();

$words[] = validateWord($_POST['Word1'], "Word 1");
$words[] = validateWord($_POST['Word2'], "Word 2");
$words[] = validateWord($_POST['Word3'], "Word 3");
$words[] = validateWord($_POST['Word4'], "Word 4");


if ($errorCount > 0) {
    echo "Please use the \"Back\" button to re-enter the data.<br />\n";
}
else {
    $wordnum = 0;
    foreach ($words as $word) {
        echo "Word ".++$wordnum.":$word<br />\n";
    }
}
?>
</body>
</html>