<?php

$sqlQuery = "SELECT * FROM $table";
if($result = $conn->query($sqlQuery)){
    if($result->num_rows > 0){
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>IP</th>";
        echo "<th>TYPE</th>";
        echo "<th>CONTINENT CODE</th>";
        echo "<th>CONTINENT NAME</th>";
        echo "<th>REGION CODE</th>";
        echo "<th>REGION NAME</th>";
        echo "<th>CITY</th>";
        echo "<th>ZIP</th>";
        echo "<th>LATITUDE</th>";
        echo "<th>LONGITUDE</th>";
        echo "<th>TIMEZONE</th>";
        echo "<th>VISITED AT</th>";
        echo "<th>TIMEZONE CODE</th>";
        echo "<th>ASN</th>";
        echo "<th>ISP</th>";
        echo "</tr>";

        while($row = $result->fetch_array()){
            echo "<p>";
            echo "<tr>";
            echo "<td>" . $row['countID'] . "</td>";
            echo "<td>" . $row['IP'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['continentCode'] . "</td>";
            echo "<td>" . $row['continentName'] . "</td>";
            echo "<td>" . $row['countryCode'] . "</td>";
            echo "<td>" . $row['countryName'] . "</td>";
            echo "<td>" . $row['regionCode'] . "</td>";
            echo "<td>" . $row['regionName'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['zip'] . "</td>";
            echo "<td>" . $row['latitude'] . "</td>";
            echo "<td>" . $row['longitude'] . "</td>";
            echo "<td>" . $row['timeZone'] . "</td>";
            echo "<td>" . $row['currentTime'] . "</td>";
            echo "<td>" . $row['code'] . "</td>";
            echo "<td>" . $row['asn'] . "</td>";
            echo "<td>" . $row['isp'] . "</td>";
            echo "</tr>";
            echo "</p>";
        }
        echo "</table>";
        echo "</div>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sqlQuery. " . $conn->error;
}
?>