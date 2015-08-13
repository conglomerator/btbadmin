<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Load common PHP
require_once("common.php");

$db_handle = new PDO('mysql:host='.$_CONFIG['DB_HOSTNAME'].';dbname='.$_CONFIG['DB_PDGDBNAME'], $_CONFIG['DB_USERNAME'], $_CONFIG['DB_PASSWORD']);

$affected_records = 0;

$rejected_args = 0;
$args = array();
foreach ($_POST as $key => $value) {
    if (!preg_match('/^[\w\d]+__[\d]+$/',$key)) {
        $rejected_args++;
        continue;
    };
    list($field, $id) = explode('__', $key);
    if (!in_array($field,array_keys($_CONFIG['GROUP_COLUMNS']))) {
        $rejected_args++;
        continue;        
    };
    $sanitized_id = filter_var($id,FILTER_SANITIZE_STRING);
    $sanitized_value = filter_var($value,FILTER_SANITIZE_STRING);
    array_push($args,array($sanitized_field,$sanitized_value,$sanitized_id));
    trigger_error($sanitized_field.' '.$sanitized_value.' '.$sanitized_id);
};

$execute_return_values = '';

$stmt = $db_handle->prepare('UPDATE PRODUCTS SET '.$field.' = ? WHERE PR_ProductID = ?');
foreach ($args as $arg) {
    trigger_error($arg[0].' '.$arg[1].' '.$arg[2]);
    $stmt->bindParam(1,$arg[0]);
    $stmt->bindParam(2,$arg[1]);
    $stmt->bindParam(3,$arg[2]);
    if (!$stmt->execute()) {
        $error_info = $stmt->errorInfo();
        trigger_error($error_info[2]);
    }
    else $affected_records++;
};

// Send umber of affected records
header('Content-Type: application/json');
echo(json_encode('Rejected: '.$rejected_args.'.  Affected: '.$affected_records.'.  '.$execute_return_values));

