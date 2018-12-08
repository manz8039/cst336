<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sql = "INSERT INTO p10_scores (id, userId, score) VALUES (NULL, :id, :score)";
$parameters = array();
$parameters[':id']=$_SESSION['userId'];
$parameters[':score']=$_POST['score'];
$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);

$sql = "select count(1) times, avg(score) from p10_scores where userId = :userId";
$parameters['userId']=$_SESSION['userId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);
$record =$stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);
?>