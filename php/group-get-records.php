<?php

// Load JWL PHP
require_once("jwl.php");

$db_handle = new PDO('mysql:host='.$_JWL['DB_HOSTNAME'].';dbname='.$_JWL['DB_PDGDBNAME'],$_JWL['DB_USERNAME'],$_JWL['DB_PASSWORD']);

$field = $_GET['field'];
$value = $_GET['value'];
$isStrict = $_GET['isStrict'];

// Build column string from config
$columnString = implode(',',array_keys($_JWL['GROUP_COLUMNS']));

$recordSet = array();
if ($field&&$value) {
    
// Build query string
    $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' LIKE "%' . mysql_escape_string($value) . '%"';
    if ($isStrict=='true') $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' = "' . mysql_escape_string($value) . '"';
    $query = $db_handle->query($queryString);
    
// Fetch records
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $recordIndex = $row['PR_ProductID'];
        unset($row['PR_ProductID']);
        $recordSet[$recordIndex] = $row;
    };
}

// Send result set
header('Content-Type: application/json');
echo(json_encode($recordSet));