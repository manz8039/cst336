<?php
session_start();
#program to check if username/password is correct
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "select * from om_admin where username = '$username' and password = '$password'";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($record);

if (empty($record)) {
    echo "Wrong username or password!";
}
else {
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    // echo "<h1>Hello, " . $record['username'] ."!</h1>";
    header('Location: admin.php'); // redirect
}
?>