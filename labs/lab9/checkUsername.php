<?php
header('Access-Control-Allow-Origin: *');

function startConnection() {
    // Creating connection
    $host = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b831dbdd87260c";
    $password = "d170c72e";
    $dbname = "heroku_c149aff39c41e5d";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

$dbConn = startConnection();

$sql = "SELECT * FROM om_admin WHERE username =:username ";

$parameters = array();
$parameters[":username"]=$_GET["username"];

$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($record);
echo json_encode($record);

?>