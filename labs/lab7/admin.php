<?php

session_start();

function displayProducts() {
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("ottermart");
    
    $sql = "select * from om_product order by productName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach ($records as $key => $value) {
        echo "<li>";
        echo $value['productName'] . " price: $" . $value['price'];
        echo "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page</title>
    </head>
    <body>
        
        <h1>ADMIN SECTION - OTTERMART</h1>
        
        <h3>Welcome <?= $_SESSION['adminFullName'] ?></h3>
        
        <br><br>
        <?= displayProducts(); ?>
    </body>
</html>