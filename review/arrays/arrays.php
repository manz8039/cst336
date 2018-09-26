<?php

    function display() {
        global $symbols;
        echo "<hr>";
        
        for ($i = 0; $i < count($symbols); $i++) {
            echo $symbols[$i] . ", ";
        }
    }

    $symbols = array();
    array_push($symbols, "seven", "oranges", "grape", "bananas", "albatross", "ligma");
    display();
    sort($symbols); // or rsort for reverse
    display();
    
    unset($symbols[2]); // removes index 2, but doesn't resize
    $symbols = array_values($symbols); // resize (re-index) array
    
    shuffle($symbols);
    echo "<hr>Random item: ";
    echo $symbols[rand(0, count($symbols) - 1)];
    
?>