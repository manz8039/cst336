<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER BY catName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
    //$sql = "SELECT * FROM om_product
    //        WHERE productName LIKE '%$product%'";
  
    $sql = "SELECT * FROM om_product WHERE 1"; //Gettting all records from database
    
    if (!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND (productName LIKE :product OR productDescription LIKE :productDescription)";
         $namedParameters[':product'] = "%$product%";
         $namedParameters[':productDescription'] = "%$product%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND catId =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    
    if (!empty($_GET['priceFrom'])) {
        $from = $_GET['priceFrom'];
        $sql .= " AND price > $from";
    }
    
    if (!empty($_GET['priceTo'])) {
        $to = $_GET['priceTo'];
        $sql .= " AND price < $to";
    }
    
    //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "productPrice") {
            
            $sql .= " ORDER BY price";
        } else {
            
              $sql .= " ORDER BY productName";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    //print_r($records);
    
    echo "<h2>Products Found:</h2>";
    foreach ($records as $record) {
        echo "<div class='item'>";
        echo "<a href='productInfo.php?productId=".$record['productId']."'>";
        echo $record['productName'];
        echo "</a> " . " $" .  $record['price'] . "<br>";
        echo $record['productDescription'];   
        echo "<br></div>";
        echo "<br>";
        
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <h1> Ottermart </h1>
        <h2> Product Search </h2>
        <div class="search">
            <form>
                
                Product: <input type="text" name="productName" placeholder="Keyword" /> <br />
                <br>
                Category: 
                <select name="category">
                   <option value=""> Select one </option>  
                   <?=displayCategories()?>
                </select>
                
                Price: From: <input type="number" name="priceFrom"  /> 
                 To: <input type="number" name="priceTo"  />
                <br>
                <br>
                Order By:
                Price <input type="radio" name="orderBy" value="productPrice">
                Name <input type="radio" name="orderBy" value="productName">
                <br><br>
                <input type="submit" name="submit" value="Search!"/>
            </form>
        </div>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
    


    </body>
</html>