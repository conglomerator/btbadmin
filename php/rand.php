<?php

// Load JWL PHP
require_once("jwl.php");

// Generate random number
$randNum = mt_rand(0,100000);

// Send random number
header('Content-Type: application/json');
echo(json_encode($randNum));