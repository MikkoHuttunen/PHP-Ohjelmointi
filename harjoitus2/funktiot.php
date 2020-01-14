<?php
    $results = [];
    
    for ($i = 0; $i < 10; $i++) {
        $noppa = rand(1,6);
        $results[] = $noppa;
    }

    function maxValue($results) {
        return $maxDice = max($results);
    }

    function minValue($results) {
        return $minDice = min($results);
    }

    function avgValue($results) {
        return $avgDice = array_sum($results) / count($results);
    }
?>

