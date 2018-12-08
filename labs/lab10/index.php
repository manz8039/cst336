<!DOCTYPE html>
<html>
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
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
        
	  <?php 
	    include 'inc/header.php';
	    
	  ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- indicators here -->
            <ol class="carousel-indicators">
                <?php
                
                    $dbConn = startConnection();
                    $sql = "SELECT pictureURL FROM pets ORDER BY name ASC";
                
                    $stmt = $dbConn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    
                    for ($i = 0; $i < count($records); $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? " class ='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php

                    $dbConn = startConnection();
                    $sql = "SELECT pictureURL FROM pets ORDER BY name ASC";
                
                    $stmt = $dbConn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 

                    for ($i = 0; $i < count($records); $i++) {
                        echo "<div class='carousel-item ";
                        echo ($i == 0) ? "active":"";
                        echo "'>";
                        echo "<img src='img/" . $records[$i]['pictureURL'] . "'>";
                        echo "</div>";
                    }
                ?>
            </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="false"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="false"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
        
        
        
        
        
        <a class="btn btn-outline-success" href="pets.php" role="button">Adopt Now</a>
        <br><br><br>
        <?php
        include 'inc/footer.php';
        
        ?>
        </body>

</html>