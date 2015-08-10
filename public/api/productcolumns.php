<?php

// Load JWL PHP
require_once("common.php");

// Send column metadata
header('Content-Type: application/json');
echo(json_encode($_CONFIG['GROUP_COLUMNS']));