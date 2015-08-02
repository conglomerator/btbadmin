<?php

// Load JWL library
require_once("jwl.php");

// Set PHP error handling options
JWLsetErrorHandlingOptions();

// Log script start
error_log("[".$_SERVER["PHP_AUTH_USER"]."] [".$_SERVER["REQUEST_URI"]."] [".$_SERVER["REQUEST_TIME"]."] Script started.");

// Generate random number
$randNum = mt_rand(0,100000);

// Send random number
header('Content-Type: application/json');
echo(json_encode($randNum));

// Log random number
error_log("[".$_SERVER["PHP_AUTH_USER"]."] [".$_SERVER["REQUEST_URI"]."] [".$_SERVER["REQUEST_TIME"]."] Random number ".$randNum." sent.");


// Log script end
error_log("[".$_SERVER["PHP_AUTH_USER"]."] [".$_SERVER["REQUEST_URI"]."] [".$_SERVER["REQUEST_TIME"]."] Script ended.");