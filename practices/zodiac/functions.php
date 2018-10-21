<?php
    function displayYears($row, $col) {
        $order = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        $year = 2020;
        for ($i = 0; $i < $row; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $col; $j++) {
                echo "<td>";
                echo "<img src='img/" . $order[($i + 8) % count($order)] . ".png' width='100' height='100'/>";
                echo "<h2>$year</h2>";
                $year++;
                echo "</td>";
            }
            echo "</tr>";
        }
    }
?>