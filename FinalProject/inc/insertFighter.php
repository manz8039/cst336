<?php
include 'connect.php';

$dbConn = startConnection();

// $sql = "SELECT * FROM sc_product";
// $stmt = $dbConn->prepare($sql);
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "INSERT INTO `ssbm_fighter` (`fighterId`, `fighterName`, `fighterWeight`, `fighterStyle`, `fighterGame`, `fighterDescription`, `fighterImage`) VALUES (NULL, " . $_GET["name"]. ", ". $_GET["weight"].", ". $_GET["style"].", ".$_GET["game"].", ".$_GET["description"].", ".$_GET["image"].")";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);
?>