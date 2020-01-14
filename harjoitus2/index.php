<?php
    include 'funktiot.php';

    foreach ($results as $dice)
    {
        echo $dice . "<br>";
    }

    echo 'Suurin luku on ' . maxValue($results) . "<br>";
    echo 'Pienin luku on ' . minValue($results) . "<br>";
    echo 'Heittojen keskiarvo on ' . avgValue($results);
?>