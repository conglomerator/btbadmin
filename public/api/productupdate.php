<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Load common PHP
require_once("common.php");

$db_handle = new PDO('mysql:host='.$_CONFIG['DB_HOSTNAME'].';dbname='.$_CONFIG['DB_PDGDBNAME'], $_CONFIG['DB_USERNAME'], $_CONFIG['DB_PASSWORD']);

$db_handle->beginTransaction();
$affected_records = 0;

foreach ($_POST as $key => $value) {
    if (preg_match('/^[\w\d]+__[\d]+$/', $key) !== false) {
        list($field, $id) = explode('__', $key);
        if (in_array($field,array_keys($_CONFIG['GROUP_COLUMNS']))) $affected_records = $affected_records + $db_handle->exec('UPDATE PRODUCTS SET '.mysql_escape_string($field).' = "'.mysql_escape_string($value).'" WHERE PR_ProductID = '.mysql_escape_string($id));
    }
}

$db_handle->commit();

// Send umber of affected records
header('Content-Type: application/json');
echo(json_encode($affected_records));

