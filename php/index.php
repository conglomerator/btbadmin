<?php
$json = array('messageType'=>'success','messageText'=>'This is a test error message.  '.rand(10,1000).".");
header('Content-Type: application/json');
echo(json_encode($json));