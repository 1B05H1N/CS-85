<?php

$ip = [];

// very insecure code

// return smc.edu website IP lookup results if your IP is empty, which happens when testing locally
// comment it out if you want to host this code on your own server (it's super insecure though)
if (empty($ip)){
    $domain = "smc.edu";
    $ip = trim(gethostbyname($domain));
} else {

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = ($_SERVER['HTTP_CLIENT_IP']);
        $ip = trim($ip);
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $ip = trim($ip);
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = trim($ip);
    }
}
if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo("<p>Your IP is $ip,and it looks like that IP is valid 🥳🥳🥳.\n\n</p>");
} else {
    echo("is invalid 😞😞😞, how did you even get this result?\n\n</p>");
}

try {
    // you'll need a subscription to ipstack to get this to work (free tier allows 100 uses, free tier account creation could prob be abused by automation)
    $request = file_get_contents('https://api.ipstack.com/'.$ip.'?access_key=//your API key//');

    $array = json_decode($request);

} catch (Exception $e) {
    echo 'Exception: ',  $e->getMessage(), "\n";
}

$IP = $array->ip;
$type = $array->type;
$continent_code = $array->continent_code;
$continent_name = $array->continent_name;
$country_code = $array->country_code;
$country_name = $array->country_name;
$region_code = $array->region_code;
$region_name = $array->region_name;
$city = $array->city;
$zip = $array->zip;
$latitude = $array->latitude;
$longitude = $array->longitude;
$time_zone = $array->time_zone->id;
$current_time = $array->time_zone->current_time;
$code = $array->time_zone->code;
$asn = $array->connection->asn;
$isp = $array->connection->isp;

require('logic.php');

?>