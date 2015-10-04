<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Load common PHP
require_once("common.php");

$db_handle = new PDO('mysql:host=' . $_CONFIG['DB_HOSTNAME'] . ';dbname=' . $_CONFIG['DB_PDGDBNAME'], $_CONFIG['DB_USERNAME'], $_CONFIG['DB_PASSWORD']);

$affected_records = 0;

$stmt1 = $db_handle->prepare('CREATE VIEW TMPA AS SELECT PR_UDSearch0, PR_UDSearch4 FROM PRODUCTS INNER JOIN INVENTORY ON PRODUCTS.PR_ProductID = INVENTORY.INV_ProdID WHERE INV_Instock > 0');

if ($stmt1->execute()) {

    $query = $db_handle->query('SELECT PR_ProductID, PR_UDSearch0 FROM PRODUCTS WHERE PR_SKU LIKE "ST-%"');
    $styles = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($styles as $style) {


        // Build query string
        $queryString = 'SELECT PR_UDSearch4 FROM TMPA WHERE PR_UDSearch0 = ?';

        // Execute query string
        trigger_error('Query string is ' . $queryString);
        $query = $db_handle->prepare($queryString);
        $query->bindParam(1, $style['PR_UDSearch0']);
        $query->execute();
        $options = $query->fetchAll(PDO::FETCH_COLUMN, 0);

        // Prepare update command
        $stmt = $db_handle->prepare('UPDATE PRODUCTS SET PR_UDSearch8 = ? WHERE PR_ProductID = ?');
        $arg1 = implode(' ', $options);
        $stmt->bindParam(1, $arg1);
        $arg2 = $style['PR_ProductID'];
        $stmt->bindParam(2, $arg2);
        trigger_error($arg[1] . ' ' . $arg[2]);

        // Execute and log update command
        if (!$stmt->execute()) {
            $error_info = $stmt->errorInfo();
            trigger_error($error_info[2]);
        } else
            $affected_records++;
    }

    $tmpa_dropped = $db_handle->exec('DROP VIEW TMPA');
}
else {
    $error_info1 = $stmt1->errorInfo();
    trigger_error($error_info1[2]);
}

// Send number of affected records
header('Content-Type: application/json');
echo(json_encode($affected_records . ' records affected.'));

