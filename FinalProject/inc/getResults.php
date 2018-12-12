<?php
include 'connect.php';

$dbConn = startConnection();

// $sql = "SELECT * FROM sc_product";
// $stmt = $dbConn->prepare($sql);
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM ssbm_fighter LEFT JOIN ssbm_weight ON ssbm_fighter.fighterWeight = ssbm_weight.weightId LEFT JOIN ssbm_style ON ssbm_fighter.fighterStyle = ssbm_style.styleId WHERE 1";

if (!empty($_GET["keyword"])) {
    $sql .= " AND (ssbm_fighter.fighterDescription LIKE '%" . $_GET["keyword"] . "%' OR ssbm_fighter.fighterName LIKE '%" .$_GET["keyword"] . "%')";
}

if (!empty($_GET["style"])) {
    $sql .= " AND ssbm_fighter.fighterStyle = " . $_GET["style"];
}

if (!empty($_GET["weight"])) {
    $sql .= " AND ssbm_fighter.fighterWeight = " . $_GET["weight"];
}

if (!empty($_GET["category"])) {
    $category = $_GET["category"];
    if ($category == "style") $sql .= " ORDER BY ssbm_fighter.fighterStyle";
    else if ($category == "weight") $sql .= " ORDER BY ssbm_fighter.fighterWeight";
    else $sql .= " ORDER BY ssbm_fighter.fighterName";
    
    if ($_GET["order"] == "descending") $sql .= " DESC";
}
//$sql = "SELECT * FROM ssbm_fighter LEFT JOIN ssbm_weight ON ssbm_fighter.fighterWeight = ssbm_weight.weightId LEFT JOIN ssbm_style ON ssbm_fighter.fighterStyle = ssbm_style.styleId WHERE 1";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);
?>