<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function displayCategories() {
    global $dbConn;
    $sql = "select distinct category from p1_quotes";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<p>Category: <select name ='category'>";
    echo "<option value=''>Select One</option>";
    foreach ($records as $record) {
        echo "<option value='" . $record['category'] . "'" . ($_GET['category'] == $record['category'] ? 'selected' : '') . ">" . $record['category'] . "</option>";
    }
    echo "</select>";
    echo "</p>";
}

function displayQuotes() {
    global $dbConn;
    $sql = "select * from p1_quotes where 1";
    $namedParameters = array();
    if (isset($_GET['keyword'])) {
        if (!empty($_GET['keyword'])) {
            $sql .= " and quote like :keyword";
            $namedParameters['keyword'] = "%" . $_GET['keyword'] . "%";
        }
        if (!empty($_GET['category'])) {
            $sql .= " and category = :category";
            $namedParameters[':category'] = $_GET['category'];
        }
        if (!empty($_GET['order'])) {
            if ($_GET['order'] == 'up') {
                $sql .= " order by quote";
            }
            else {
                $sql .= " order by quote desc";
            }
        }
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='quotes'>";
    foreach ($records as $record) {
        echo "<p>" . $record['quote'] . " (<em>" . $record['author'] . "</em>)</p>";
    }
    echo "</div>";
}
?>