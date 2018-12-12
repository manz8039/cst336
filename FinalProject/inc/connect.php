<?php
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
?>