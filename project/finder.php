<?php

// hardcoded creds is usually a big no-no, we  should store these as env vars or better yet, in something like vault
// creds to testing internally
$user = "root";
$password = "";
$host = "localhost";
$database = "internet";
$table = "visitors";

require('search-ip.php');

// a somewhat modified version of one of our assignments
// create connection
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("<p>database connection not successful 😞😞😞" . $conn->connect_error ."\n\n</p>");
} else {
    echo "<p>database connection successful 😊😊😊 </p>";
}

$conn = mysqli_connect($host, $user, $password);
if ($conn === False) {
    echo "<p>Unable to connect to the server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
} else {
    $DBName = $database;
    if (!mysqli_select_db($conn, $DBName)) {
        $query = "CREATE DATABASE $DBName";
        $result = mysqli_query($conn, $query);
        if ($result === FALSE) {
            echo "<p>unable to execute the query 😞😞😞, due to " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        } else { // if else first name
            echo "<p>you are the first to be looked up!</p>";
        }
    }
    mysqli_select_db($conn, $DBName);

    $query = "SHOW TABLES LIKE '$table'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE $table (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, IP VARCHAR(100), type VARCHAR(100), continentCode VARCHAR(100), continentName VARCHAR(100), countryCode VARCHAR(100), countryName VARCHAR(100), regionCode VARCHAR(100), regionName VARCHAR(100), city VARCHAR(100), zip VARCHAR(100), latitude VARCHAR(100), longitude VARCHAR(100), timeZone VARCHAR(100), currentTime VARCHAR(100), code VARCHAR(100), asn VARCHAR(100), isp VARCHAR(100))";
        $result = mysqli_query($conn, $query);
        if ($result === FALSE) {
            echo "<p>unable to create table 😞😞😞, due to ". mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }

    }

    $query = "INSERT INTO $table VALUES(NULL,'$ip', '$type', '$continent_code','$continent_name','$country_code','$country_name','$region_code','$region_name','$city','$zip','$latitude','$longitude','$time_zone','$current_time','$code','$asn','$isp')";
    $result = mysqli_query($conn, $query);

    if ($result === False) {
        echo "<p>unable to execute the query 😞😞😞, due to " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
    } else {
        echo "<p>$ip added to the $table table in the $DBName database 🎉🎉🎉 </p>";
    }
}

require ('recent.php');

// Close connection
mysqli_close($conn);


?>


