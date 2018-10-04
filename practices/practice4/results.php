<!DOCTYPE html>
<?php
    $suits = array("clubs", "diamonds", "hearts", "spades");
    $omit = $_POST["omit"];
    $cards = range(0, 51);
    
    $numKings = 0;
    $numAces = 0;
    
    function display($cardValue, $suit) {
        global $numKings;
        global $numAces;
        $class = "none";
        if ($cardValue == 13) {
            $numKings++;
            $class = "king";
        }
        if ($cardValue == 1) {
            $numAces++;
            $class = "ace";
        }
        
        echo "<img class = '$class' src = 'cards/$suit/$cardValue.png'>";
        
    }
    
    function draw() {
        global $cards;
        global $suits;
        global $omit;
        while (true) {
            shuffle($cards);
            $card = array_pop($cards);
            $suit = $suits[floor($card/13)];
            $cardValue = $card % 13 + 1;
            if ($suit == $omit) continue;
            display($cardValue, $suit);
            return;
        }
    }
    
    function printColumns() {
        $columns = $_POST['columns'];
        for ($i = 0; $i < $columns; $i++) {
            echo "<div class='column'>";
            draw();
            echo "</div>";
        }
    }
    
    function printRows() {
        $rows = $_POST['rows'];
        for ($i = 0; $i < $rows; $i++) {
            echo "<div class='row'>";
            printColumns();
            echo "</div>";
        }
    }

    function playGame() {
        global $numKings;
        global $numAces;
        
        printRows();
        echo "<br><br><br><br><br><h1>Aces have $numAces and Kings have $numKings</h1>";
        if ($numKings > $numAces) {
            echo "<h1>Kings win!</h1>";
        }
        else if ($numAces > $numKings) {
            echo "<h1>Aces win!</h1>";
        }
        else {
            echo "<h1>No Winner! It's a tie!</h1>";
        }
    }
?>
<html>
    <head>
        <title>Result</title>
    <style>
        body {
            text-align: center;
        }
        .row {
            clear: left;
            margin-left: 40%;
        }
        .column {
            float: left;
        }
        .king {
            border: 5px solid cyan;
        }
        .ace {
            border: 5px solid yellow;
        }
        .none {
            border: 5px solid white;
        }
        .game {
            border: 2px solid black;
            padding-left: auto;
            padding-right: auto;
        }
    </style>
    </head>
    <body>
        <div class="game">
            <h1>Aces vs. Kings!</h1>
            <?php
                playGame();
            ?>
        </div>
        
    </body>
            
</html>