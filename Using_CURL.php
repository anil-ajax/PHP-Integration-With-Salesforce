<?php

/**
 * PHP and Salesforce Integration using CURL
 * @author Anil Kumar (https://github.com/anil-ajax)
 */

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://login.salesforce.com/services/oauth2/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,         

"grant_type=password&client_id=<client id from salesforce>&client_secret=<client seccret from salesforce>&username=<your salesforce username>&password=<your salesforce password>");


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

//echo '<pre>';
$res = json_decode($server_output);

$token = $res->access_token;


// get products 


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://anil99-dev-ed.my.salesforce.com/services/apexrest/productServiceV2");
curl_setopt($ch, CURLOPT_POST, 0);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     'Authorization: Bearer $token'
    ));



curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

echo '<pre>';
$res = 'here'.$server_output;

echo '<pre>';
print_r($res);


?>
