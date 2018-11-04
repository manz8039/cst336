<?php

function startConnection($dbname="ottermart") {
    // Creating connection
    $host = "localhost";
    $username = "root";
    $password = "";
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
       $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
       echo $url;
       $host = $url["host"];
       echo $host;
       $dbname = substr($url["path"], 1);
       echo $dbname;
       $username = $url["user"];
       echo $username;
       $password = $url["pass"];
       echo $password;
   }
   
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}


?>

