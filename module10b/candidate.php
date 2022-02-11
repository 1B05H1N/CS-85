<?php

require('connect.php');

$interviewer = $_POST['interviewer'];
$position = $_POST['position'];
$date = $_POST['date'];
$candidate = $_POST['candidate'];
$communication = $_POST['communication'];
$computerskills = $_POST['computerskills'];
$businessknowledge = $_POST['businessknowledge'];
$comments = $_POST['comments'];

$query = "INSERT INTO candidate VALUES('$interviewer', '$position', '$date', '$candidate', '$communication', '$computerskills', '$businessknowledge', '$comments')";

if (mysqli_query($DBConnection, $query)) {
    echo "<script type='text/javascript'>alert('!!! Record added sucessfully !!!');window.location.href='interview.php'</script>";
} else {
    echo "<script type='text/javascript'> alert('!!! Data was not added successfully !!!');window.location.href='interview.php'</script>";
}

?>