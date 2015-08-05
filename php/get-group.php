<?php

// Load JWL PHP
require_once("jwl.php");

$db_handle = new PDO('mysql:host='.$_JWL['DB_HOSTNAME'].';dbname='.$_JWL['DB_PDGDBNAME'],$_JWL['DB_USERNAME'],$_JWL['DB_PASSWORD']);

$field = $_GET['field'];
$value = $_GET['value'];

// Execute query
$resultSet = array();
$columns = array();
if ($field&&$value) {
    $query = $db_handle->query('SELECT * FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' LIKE "%' . mysql_escape_string($value) . '%" ORDER BY PR_SKU DESC');
    
    // Derive columns
    for ($i = 0; $i<$query->columnCount(); $i++) {
        $columnMeta = $query->getColumnMeta($i);
        array_push($columns, array('name'=>$columnMeta['name'],'show'=>false));
    }
    
    // Fetch results
    $resultSet = $query->fetchAll(PDO::FETCH_ASSOC);
}

// Send result set
header('Content-Type: application/json');
echo(json_encode(array('columns'=>$columns,'results'=>$resultSet)));