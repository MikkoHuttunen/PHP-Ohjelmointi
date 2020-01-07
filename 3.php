<?php
    $even_numbers = [2,4,6,8,10];

    $female_names = [Laura,Anna,Maija,Alisa,Neea];
    $male_names = [Mauri,Aleksi,Niko,Markus,Timo];

    $names = array_merge($female_names, $male_names);

    print_r($even_numbers);
    print_r($names);
?>