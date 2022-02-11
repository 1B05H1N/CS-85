<!DOCTYPE html>
<!--filename: showguestbook.php-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>show guest book</title>
</head>
<body>

<?php

$user="root"; // username
$password=""; // password
$host="localhost"; // server

// initiate connecting
$DBConnect= mysqli_connect($host, $user, $password);
if ($DBConnect === False) echo"<p>Unable to connect to the server.</p>" . "<p>Error code" . mysqli_errno($DBConnect) . ": " . mysqli_error(DBconnect) . "</p>";
    else {
        $DBName = "guestbook";
        // if else if database doesn't connect
        if (!mysqli_select_db($DBConnect, $DBName)) echo "<p>There is no entry in the guest book!</p>";
        // otherwise print the values
            else {
                $TableName = "visitors";
                $SQLString = "SELECT * FROM $TableName";
                $QueryResult = mysqli_query($DBConnect, $SQLString);
                if (mysqli_num_rows($QueryResult) == 0) echo "<p>There are no entries in the guest book!</p>";
                else {
                    // print the values in table format
                    echo "<p>The following visitors have signed our guest book:</p>";
                    echo "<table width='100%' border='1'border='1'>";
                    echo "<th><th>First Name</th><th>Last Name</th></tr>";
                    while ($Row = mysqli_fetch_array($QueryResult)) {
                        echo "<tr><td>{$Row['first_name']}</td>";
                        echo "<td>{$Row['last_name']}</td></tr>";
                    }
            }
            mysqli_free_result($QueryResult);
        }
        // close connection
        mysqli_close($DBConnect);
    }

?>