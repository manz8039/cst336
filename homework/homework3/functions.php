<?php
$animals = array("wolf", "swan", "eagle", "sloth");

function validate($id) {
    if (isset($_GET[$id]) && empty($_GET[$id])) {
        return "class='wrong'";
    }
    $_SESSION['valid']++;
}

function grade($valid) {
    if ($valid == 2) {
        global $animals;
        $scores = array(0,0,0,0);
        $scores[$_GET['one'] - 1]++;
        $scores[$_GET['two'] - 1]++;
        $scores[$_GET['three'] - 1]++;
        $scores[$_GET['four'] - 1]++;
        $scores[$_GET['five'] - 1]++;
        $scores[$_GET['six'] - 1]++;
        $max = $score[0];
        for ($i = 1; $i < 4; $i++) {
            if ($score[$i] > $max) $max = $score[$i];
        }
        $trueAnimal = array();
        for ($i = 0; $i < 4; $i++) {
            if ($scores[$i] == $max) array_push($trueAnimal, $i);
        }
        for ($i = 0; $i < count($trueAnimal); $i++) {
            echo "<img src='img/" . $animals[$i] . "'>";
        }
        return;
    }
    echo "<h3>You have invalid fields.</h3>";
}
?>