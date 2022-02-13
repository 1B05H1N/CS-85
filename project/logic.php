<?php

// accessing the values from the php object per https://www.w3schools.com/php/func_json_decode.asp
echo "<div>";
echo "<p>IP INFORMATION<br><br>";
echo "ip: " . $IP . "<br>";
echo "type: " . $type;
echo "continent_code: " . $continent_code. "<br>";
echo "continent_name: " . $continent_name. "<br>";
echo "country_code: " . $country_code. "<br>";
echo "country_name: " . $country_name. "<br>";
echo "region_code: " . $region_code. "<br>";
echo "region_name: " . $region_name. "<br>";
echo "city: " . $city. "<br>";
echo "zip: " . $zip. "<br>";
echo "latitude: " . $latitude. "<br>";
echo "longitude: " . $longitude. "<br>";
echo "timezone id: " . $time_zone. "<br>";
echo "current_time: " . $current_time. "<br>";
echo "timezone code: " . $code. "<br>";
echo "asn: " . $asn. "<br>";
echo "isp: " . $isp. "<br></p>";
echo "</div>";
?>
