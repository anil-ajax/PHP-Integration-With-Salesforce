<?php

/**
 * PHP and Salesforce Integration using connected app 
 * @author Anil Kumar (https://github.com/anil-ajax)
 */

// IT REQUIRES HTTPS BASED REDIRECT_URI. SO EVEN IF YOU USING LOCALHOST MAKE SURE YOU CONFIGURE HTTPS://LOCALHOST FIRST

session_start();

define("CLIENT_ID", "<client id from connected app in salesforce>");
define("CLIENT_SECRET", "<client secret from connected app in salesforce>");
define("REDIRECT_URI", "<complete URL where it will redirect after successful login>");
define("LOGIN_URI", "https://login.salesforce.com");



$auth_url = LOGIN_URI
        . "/services/oauth2/authorize?response_type=code&client_id="
        . CLIENT_ID . "&redirect_uri=" . REDIRECT_URI;

header('location: ' . $auth_url); // you will get session appended in URL. Use this session for communication with sf
?>
