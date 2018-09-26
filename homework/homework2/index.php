<!DOCTYPE html>
<html lang="en">
    <title>
        Homework2
    </title>
    <?php
        $features = array("eye","eye","lips","nose");
        $l_0 = range(0, 1);
        $l_1 = range(0, 1);
        $l_2 = range(0, 1);
        $l_3 = range(0, 1);
        
        $usual = array(array(30, 60), array(35, 60), array(27, 40), array(27, 50));
        $actual = array();
        
        function displayFeature($feature, $version, $list) {
            $x = rand(20, 35);
            $y = rand(30, 70);
            echo "<img class='feature' src='$feature/$version.png' style='bottom:$y%; right:$x%;' alt='$feature'>";
            return array($x, $y);
        }
        
        function chooseVersion($feature, $list) {
            global $actual;
            global $features;
            global ${"l_$list"};
            while (true) {
                $version = rand(1, 5);
                if (in_array($version, ${"l_$list"}, strict) == false) {
                    array_push(${"l_$list"}, $version);
                    array_push($actual, displayFeature($features[$feature], $version, $list));
                    break;
                }
            }
        }
        
        function appraise() {
            global $actual;
            global $usual;
            $price = 0;
            for ($i = 0; $i < 5; $i++) {
                $price += abs($usual[$i][0] - $actual[$i][0]) + abs($usual[$i][1] - $actual[$i][1]);
            }
            echo $price;
        }
        
        function makeArt() {
            global $used;
            for ($i = 0; $i < 4; $i++) {
                chooseVersion($i, $i);
            }
        }
        
    ?>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
    </head>
    <body>
        <div id ="content">
            <h1 class="title">Picasso Art Generator</h1>
                <?php
                makeArt();
            ?>
            <h2 class="seller">Selling price: <br>$ <?php appraise(); ?> Million</h2>
        </div>
        
    </body>
    
</html>