<!DOCTYPE html>
<html>
    <head>
        <title> Random</title>
        <style>
            body {
                <?php
                    $red=rand(0, 255);
                    $green=rand(0, 255);
                    $blue=rand(0,255);
                    echo "background-color: rgba($red, $green, $blue);";
                ?>
            }
            
        </style>
    </head>
    <body>
        <h1>
            My lucky number is: 
            <?php
                while (true) {
                    $luckNum = rand(1, 10);
                    if ($luckNum != 4) {
                        echo $luckNum;
                        return;
                    }
                }
            ?>
        </h1>
    </body>
</html>