<?php

// Load JWL PHP
require_once("jwl.php");

// Send column metadata
header('Content-Type: application/json');
echo(json_encode($_JWL['GROUP_COLUMNS']));