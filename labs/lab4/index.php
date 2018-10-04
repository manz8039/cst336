<?php
    $backgroundImage = "img/sea.jpg";
    include 'api/pixabayAPI.php';
    $keyword = "";
    if (!empty($_GET["keyword"])) $keyword = $_GET["keyword"];
    else if (!empty($_GET['category'])) $keyword = $_GET['category'];
    if (!empty($keyword)) {
        $imageURLs = getImageURLs($keyword, $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage?>');
                background-size: cover;
            }
            .orientation {
                background-color: rgba(255,255,255,.5);
                width: 100px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <br /><br />
        
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            
            <div class="orientation">
                <input type="radio" id="lhorizontal" name="layout" value="horizontal">
                <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
                <input type="radio" id="lvertical" name="layout" value="vertical">
                <label for="Vertical"></label><label for="lvertical">Vertical</label>
            </div>
            
            
            <select name="category">
                <option value="">Select One</option>
                <option <?= ($_GET['category'] == "ocean" ? " selected": "")?> value="ocean">Sea</option>
                <option <?= ($_GET['category'] == "forest" ? " selected": "")?> value="forest">Forest</option>
                <option <?= ($_GET['category'] == "mountain" ? " selected": "")?> value="mountain">Mountain</option>
                <option <?= ($_GET['category'] == "snow" ? " selected": "")?> value="snow">Snow</option>
                <option <?= ($_GET['category'] == "otter" ? " selected": "")?> value="otter">Otters</option>
                
            <input type="submit" value="Search" />
            <br/><br/>
        </form>
        
        
        <?php
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            } else {
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- indicators here -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? " class ='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo "<div class='carousel-item ";
                        echo ($i == 0) ? "active":"";
                        echo "'>";
                        echo "<img src='" . $imageURLs[$randomIndex] . "'>";
                        echo "</div>";
                        
                        unset($imageURLs[$rndomIndex]);
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
        
        <?php
            }
        ?>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>