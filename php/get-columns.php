<?php

// Load JWL PHP
require_once("jwl.php");

$db_handle = new PDO('mysql:host='.$_JWL['DB_HOSTNAME'].';dbname='.$_JWL['DB_PDGDBNAME'],$_JWL['DB_USERNAME'],$_JWL['DB_PASSWORD']);

// Execute query
$columns = array();
$query = $db_handle->query('SELECT '.$_JWL['GROUP_EDIT_COLUMNS'].' FROM PRODUCTS LIMIT 1');
    
    // Derive columns
    for ($i = 0; $i<$query->columnCount(); $i++) {
        $columnMeta = $query->getColumnMeta($i);
        $columns[$columnMeta['name']] = array('show'=>false);
    }

// Send result set
header('Content-Type: application/json');
echo(json_encode($columns));