<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");


$sql = "SELECT * FROM p10_users where 1";
$parameters = array();
$parameters[":username"]=$_POST["username"];
$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($records);
//echo "<hr>";
//echo $records[2] . "<br>";
//echo $records[1]['catDescription'] . "<br>";

if ($record['password'] == $_POST['password']) {
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['userId'] = $record['userId'];
    header("Location: quiz.php");
    exit();
}


?>