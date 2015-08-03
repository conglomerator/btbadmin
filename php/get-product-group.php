<?php

// Load JWL PHP
//require_once("jwl.php");

// Database constants *** need to figure out how to add this in

$db_handle = new PDO('mysql:host='.MYSQL_HOSTNAME.';dbname='.MYSQL_PDGDBNAME,MYSQL_USERNAME,MYSQL_PASSWORD);

$field = $_GET['field'];
$value = $_GET['value'];

$resultSet = array();
if ($field&&$value) {
    $query = $db_handle->query('SELECT * FROM PRODUCTS WHERE ' . mysql_escape_string($field) . ' LIKE "%' . mysql_escape_string($value) . '%" ORDER BY PR_SKU DESC');
    $resultSet = $query->fetchAll(PDO::FETCH_ASSOC);
}

// Send result set
header('Content-Type: application/json');
echo(json_encode($resultSet));