<?php
$animals = array("wolf", "swan", "eagle", "sloth");

function q1() {
    
}

function grade() {
    $scores = array(0,0,0,0);
    $scores[$_GET['one']]++;
    $scores[$_GET['two']]++;
    $scores[$_GET['three']]++;
    $scores[$_GET['four']]++;
    $scores[$_GET['five']]++;
    $scores[$_GET['six']]++;
    $scores[$_GET['seven']]++;
    $scores[$_GET['eight']]++;
    $scores[$_GET['nine']]++;
    $max = $score[0];
    for ($i = 1; $i < 4; $i++) {
        if ($score[$i] > $max) $max = $score[$i];
    }
    $trueAnimal = array();
    for ($i = 0; $i < 4; $i++) {
        if ($scores[$i] == $max) array_push($trueAnimal, $i);
    }
    return $trueAnimal;
}
?>