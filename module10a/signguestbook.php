<?php
// filename: signguestbook.php
if (empty($_POST['first_name']) || empty($_POST['last_name'])) { //check if name is empty
    echo "<p>You must enter your first name and last name! Click your browser's Back button to return to the Guest Book form</p>";
}
else { // if name is empty, use following creds / connection string
    $user="root"; // username
    $password=""; // password
    $host="localhost"; // server

    $DBConnect = mysqli_connect($host, $user, $password); // initiate connection
    if ($DBConnect === False) { // if else to check if db connect fails
        echo "<p>Unable to connect to the server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    } else { // connection initiated
        $DBName = "guestbook";
        if (!mysqli_select_db($DBConnect, $DBName)) { // if else to check if name is in guestbook starting with if not
            $SQLString = "CREATE DATABASE $DBName"; // create entry
            $QueryResult = mysqli_query($DBConnect, $SQLString);
            if ($QueryResult === FALSE) { // if else check if db was queries or not
                echo "<p>Unable to execute the query</p>" . "<p>Error code" . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            } else { // if else first name
                echo "<p>You are the first visitor!</p>";
            }
        }
        mysqli_select_db($DBConnect, $DBName);

        // checking if visitor is in the db
        $TableName = "visitors"; // setting table name
        $SQLString = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLString);

        if (mysqli_num_rows($QueryResult) == 0) {
            $SQLString = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, last_name VARCHAR(40), first_name VARCHAR(40))";
            $QueryResult = mysqli_query($DBConnect, $SQLString);
            if ($QueryResult === FALSE) {
                echo "<p>Unable to create table.</p>" . "<p>Error code" . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }

        }

        // sql statement to add values
        $Lastname = stripslashes($_POST['last_name']);
        $Firstname = stripslashes($_POST['first_name']);
        $SQLString = "INSERT INTO $TableName VALUES(NULL,'$Lastname', '$Firstname')";
        $QueryResult = mysqli_query($DBConnect, $SQLString);

        // if queries don't work, error out, otherwise thank visitor
        if ($QueryResult === False) {
            echo "<p>Unable to execute query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<h1>Thank you for signing our guest book!</h1>";
        }

        mysqli_close($DBConnect);
    }
}

?>