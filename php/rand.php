<?php

// Load JWL library
require_once("jwl.php");

// Set PHP error handling options
JWLsetErrorHandlingOptions();

// Log script usage
$userMessage = "";
if ($_SERVER["PHP_AUTH_USER"]) $userMessage = "by ".$_SERVER["PHP_AUTH_USER"];
trigger_error("Random number script begun".$userMessage);

// Send random number
header('Content-Type: application/json');
echo(json_encode(mt_rand(0,1000)));