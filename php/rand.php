<?php

// Send random number
header('Content-Type: application/json');
echo(json_encode(mt_rand(0,1000)));