<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>visit tracker</title>
</head>
<body>

<?php
$special = array(5,10,15);
$normal = "Number of views: " . $_COOKIE['times'] . ".";

if (!isset($_COOKIE['times'])){

    $visit = 1;
    setcookie("times", $visit);
} else {
    $visit = ++$_COOKIE['times'];
    setcookie("times", $visit);
    if (in_array($visit, $special)) {
        $normal = "<h1><em>✨✨✨<u><mark><b>SPECIAL MESSAGE!!!</b></mark></u>✨✨✨</em></h1>\n\n😲😲😲<i><b>YOU</b>'re the <b>" . $_COOKIE['times'] . "</b>th visitor, <mark><b>wow!</b></mark></i>😲😲😲";
        $visit = ++$_COOKIE['times'];
        setcookie("times", $visit);
    } else if($visit >= 20){
        unset($_COOKIE['times']);
        $visit = 1;
        setcookie("times", $visit);
    }
}
echo($normal)
?>

</body>
</html>