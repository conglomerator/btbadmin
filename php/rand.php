<?php
$message = array('type'=>'info','text'=>'This is a test message.');
$json = array('message'=>$message);
header('Content-Type: application/json');
echo(json_encode($json));