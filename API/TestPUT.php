<?php
/**
 *  Example API call
 *  Update the profiles in a database
 */

// the databaseID

$databaseID = 756;

// find all Johns living in Amsterdam
 
$data = array(
            "name" => "John", 
            "city" => "Amsterdam" 
        );

// and update their landcode 

$update = array(
    'countrycode' => 'nl_NL'
);

// make the POST fields

$data_string = json_encode($update); 

// initialize array

$url = array();

foreach ($data as $key => $value)
{
    // make the url encoded query string
    
    $url[] = 'fields[]='.urlencode($key.'=='.$value);
}

$url = implode('&', $url);

// the token

$token = 'your token';

// set up the curl resources

$ch = curl_init();

echo ("https://api.copernica.com/database/$databaseID/profiles/?$url").PHP_EOL;

curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/database/$databaseID/profiles/?access_token=$token&$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // note the PUT here

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string)                                                                       
));       

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header
 
echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
