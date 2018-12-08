<?php session_start();
$_SESSION['user']="";
$_SESSION['userId']="";
header("Location: login.php");
?>