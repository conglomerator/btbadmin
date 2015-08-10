<?php

// Load common PHP
require_once("common.php");

$db_handle = new PDO('mysql:host='.$_CONFIG['DB_HOSTNAME'].';dbname='.$_CONFIG['DB_PDGDBNAME'],$_CONFIG['DB_USERNAME'],$_CONFIG['DB_PASSWORD']);

$field = $_GET['field'];
$value = $_GET['value'];
$isStrict = $_GET['isStrict'];

// Build column string from config
$columnString = implode(',',array_keys($_CONFIG['GROUP_COLUMNS']));

$recordSet = array();
if (in_array($field,array_keys($_CONFIG['GROUP_COLUMNS']))&&$value) {
    
// Build query string
    $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' LIKE "%' . mysql_escape_string($value) . '%"';
    if ($isStrict) $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' = "' . mysql_escape_string($value) . '"';
    $query = $db_handle->query($queryString);
    
// Fetch records
    $recordSet = $query->fetchAll(PDO::FETCH_ASSOC);
    
};

// Send result set
header('Content-Type: application/json');
echo(json_encode($recordSet));