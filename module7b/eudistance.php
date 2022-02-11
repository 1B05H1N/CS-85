<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EU Distance</title>
</head>
<body>

<h3>
    select a starting and ending capital:
</h3>

<?php

$start = 0;
$end = 0;

$distances = array(
    "berlin" => array("berlin" => 0, "moscow" => 1607.99, "paris" => 876.96, "prague" => 280.34, "rome" => 1181.67),
    "moscow" => array("berlin" => 1607.99, "moscow" => 0, "paris" => 2484.92, "prague" => 1664.04, "rome" => 2374.26),
    "paris" => array("berlin" => 876.96, "moscow" => 641.31, "paris" => 0, "prague" => 885.38, "rome" => 1105.76),
    "prague" => array("berlin" => 280.34, "moscow" => 1664.04, "paris" => 885.38, "prague" => 0, "rome" => 922),
    "rome" => array("berlin" => 1181.67, "moscow" => 2374.26, "paris" => 1105.76, "prague" => 922, "rome" => 0)
);

if (isset($_POST['submit'])) {
    $start = stripslashes($_POST['start']);
    $end = stripslashes($_POST['end']);

    if (isset($distances[$start]) && ($distances[$end]))
        echo "<p>The distance from $start to $end is: " . $distances[$start][$end] . " km";
}
?>
<!--resources: https://www.phptutorial.net/php-tutorial/php-select-option/ / https://stackoverflow.com/questions/17139501/using-post-to-get-select-option-value-from-html/17139538-->
<form action="eudistance.php" method="post">
    <div>
        <label for="start">starting capital</label>
        <select name="start" id="start">
            <?php foreach ($distances as $city => $hold) {
                echo "<option value='$city'>--- $city ---</option>\n";
            }
            ?>
        </select><br><br>
        <label for="end">ending capital</label>
        <select name="end" id="end">
            <?php foreach ($distances as $city => $hold) {
                echo "<option value='$city'>--- $city ---</option>\n";
            }
            ?>
        </select><br><br>
    </div>
    <div>
        <input type="submit" name="submit" value="calc distance in km"/>
    </div>
</form>
</body>
</html>
