<?php
include 'connect.php';

$dbConn = startConnection();

// $sql = "SELECT * FROM sc_product";
// $stmt = $dbConn->prepare($sql);
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM ssbm_fighter LEFT JOIN ssbm_weight ON ssbm_fighter.fighterWeight = ssbm_weight.weightId LEFT JOIN ssbm_style ON ssbm_fighter.fighterStyle = ssbm_style.styleId WHERE ssbm_fighter.fighterId = " . $_GET["id"];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($records);
echo json_encode($record);

?>