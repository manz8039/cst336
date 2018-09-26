<!DOCTYPE html>
<html>

<?php

    function playGame() {
        /*
        rock = 0
        paper = 1
        scissors = 2
        */
        
        $p1wins = 0;
        $p2wins = 0;
        
        
        for ($i = 0; $i < 3; $i++) {
            $p1 = rand(0, 2);
            $p2 = $p1;
            while ($p1 == $p2) {
                $p2  = rand(0, 2);
            }
            $winner = displayMatch($p1, $p2);
            if ($winner == 1) $p1wins++;
            else $p2wins++;
        }
        finalwinner($p1wins, $p2wins);
        
        
    }
    
    function displayMatch($p1, $p2) {
        $winner;
        if (($p1 == 0 && $p2 == 2) || ($p1 == 1 && $p2 == 0) || ($p1 == 2 && $p2 == 1)) {
            $winner = 1;
            echo "<div class='row'>
        <div class='col, matchWinner'><img src='img/$p1.png' alt='scissors' width='150'></div>
        <div class='col'><img src='img/$p2.png' alt='rock' width='150'></div>
    </div>";
        }
        else {
            $winner = 2;
            echo "<div class='row'>
        <div class='col'><img src='img/$p1.png' alt='scissors' width='150'></div>
        <div class='col, matchWinner'><img src='img/$p2.png' alt='rock' width='150'></div>
    </div>";
        }
        
        return $winner;
    }
    
    function finalwinner($p1wins, $p2wins)
    {
        if ($p1wins >= 2)
        {
            echo "<div id='finalWinner'>

        <h1>The winner is Player 1</h1>

    </div>";
        }
        else
        {
            echo "<div id='finalWinner'>

        <h1>The winner is Player 2</h1>

    </div>";
        }
    }

?>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <!--<div class="row">
        <div class='col'><img src='img/scissors.png' alt='scissors' width='150'></div>
        <div class='col, matchWinner'><img src='img/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div class="row">
        <div class='col'><img src='img/rock.png' alt='rock' width='150'></div>
        <div class='col, matchWinner'><img src='img/paper.png' alt='paper' width='150'></div>
    </div>
    <hr>
    
    <div class="row">
        <div class='col, matchWinner'><img src='img/paper.png' alt='paper' width='150'></div>
        <div class='col'><img src='img/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div id="finalWinner">

        <h1>The winner is Player 2</h1>

    </div> -->
    <?php
        playGame();
    ?>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
    <footer>
        <h1>Cean Manzano & Eric Munoz</h1>
    </footer>
</body>

</html>
