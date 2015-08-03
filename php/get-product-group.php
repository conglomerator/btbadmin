<?php

// Load JWL PHP
//require_once("jwl.php");

define('MYSQL_USERNAME', 'cocheese_1911');
define('MYSQL_PASSWORD', 'JxMa2e8');
define('MYSQL_HOSTNAME', 'localhost');
define('MYSQL_PDGDBNAME','cocheese_pdgcommerce');

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