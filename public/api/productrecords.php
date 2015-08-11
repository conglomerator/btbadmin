<?php

// Load common PHP
require_once("common.php");

$db_handle = new PDO('mysql:host='.$_CONFIG['DB_HOSTNAME'].';dbname='.$_CONFIG['DB_PDGDBNAME'],$_CONFIG['DB_USERNAME'],$_CONFIG['DB_PASSWORD']);

$field = filter_var($_GET['field'],FILTER_SANITIZE_STRING);
$value = filter_var($_GET['value'],FILTER_SANITIZE_STRING);
$isStrict = filter_var($_GET['isStrict'],FILTER_VALIDATE_BOOLEAN);

// Build column string from config
$columnString = implode(',',array_keys($_CONFIG['GROUP_COLUMNS']));

$recordSet = array();
if (in_array($field,array_keys($_CONFIG['GROUP_COLUMNS']))&&$value) {
    
// Build query string
    $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE '.$field.' = :value';
    if (!$isStrict) {
        $value = '%'.$value.'%';
        $queryString = 'SELECT PR_ProductID,'.$columnString.' FROM PRODUCTS WHERE '.$field.' LIKE :value';
    };
    trigger_error('Query string is '.$queryString);
    $query = $db_handle->prepare($queryString);
    $query->bindParam(':value',$value);
    $query->execute();
    
// Fetch records
    $recordSet = $query->fetchAll(PDO::FETCH_ASSOC);
    
};

// Send result set
header('Content-Type: application/json');
echo(json_encode($recordSet));