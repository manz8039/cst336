<?php
include 'connect.php';

$dbConn = startConnection();

// $sql = "SELECT * FROM sc_product";
// $stmt = $dbConn->prepare($sql);
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM ssbm_weight WHERE 1";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($records);
echo json_encode($records);

?>