<?php
include 'connect.php';

$dbConn = startConnection();

// $sql = "SELECT * FROM sc_product";
// $stmt = $dbConn->prepare($sql);
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT COUNT(*) FROM ssbm_fighter WHERE 1";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($records);
echo json_encode($record);

?>